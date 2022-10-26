<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Eventjuicer\Services\Resolver;
use Eventjuicer\Services\GetByRole;
use Eventjuicer\Services\SaveOrder;
use Eventjuicer\Services\Personalizer;
use Eventjuicer\Repositories\MeetupRepository;
use Eventjuicer\Repositories\Criteria\FlagEquals;
use Eventjuicer\Repositories\Criteria\BelongsToEvent;

class Vips extends Command {

    protected $signature = 'visitors:vips

        {--domain=}
        {--direction=""}
       
    ';
    
    protected $description = 'Get the list of VIPs';
 
    public function __construct()
    {
        parent::__construct();
    }
 
    public function handle(MeetupRepository $meetups, SaveOrder $saveorder)
    {
       
        $domain = $this->option("domain");
        $direction = $this->option("direction");

        $errors = [];


        if(empty($domain)) {
            $errors[] = "--domain= must be set!";
        }

        if(count($errors)){
            foreach($errors as $error){
                $this->error($error);
            }
            return;
        }

        
      

        /**
            LET'S FUCKING START!
        **/

        $route = new Resolver( $domain );

        $eventId =  $route->getEventId();

        $this->info("Event id: " . $eventId);

        $meetups->pushCriteria(new BelongsToEvent($eventId));
        $meetups->pushCriteria(new FlagEquals("agreed", 1));
        if($direction){
            $meetups->pushCriteria(new FlagEquals("direction", $direction));
        }

        $vips = $meetups->with(["participant.fields", "rel_participant_id.fields"])->all();

        $this->info("Number of unique VIPs: " . $vips->unique("participant_id")->count() );

        $done = 0;

        $phones = array();
        $all = array();

        foreach($vips as $vip)
        {

            $participant = $vip->participant;
            $presenter = $vip->presenter;

            $participant_profile = (new Personalizer($participant));
            $presenter_profile = (new Personalizer($presenter));

            $details = $participant_profile->translate('"[[fname]]", "[[lname]]", "[[cname2]]", "[[phone]]", "[[presentation_venue]]", "[[presentation_time]]"');
            
            $this->line($details);

            $all[] = $details;

            $done++;

        }   


        $baseFilename = "export".md5(time() . $eventId).".txt";

        // file_put_contents(
        //     app()->basePath("storage/app/public/" . "phones_".$baseFilename), 
        //     implode( "\n", $phones )
        // );

        file_put_contents(
            app()->basePath("storage/app/public/" . "all_".$baseFilename), 
            implode( "\n", $all )
        );

        // $this->info("storage/" . "phones_" . $baseFilename);
        $this->info("storage/" . "all_" . $baseFilename);

    }
}
