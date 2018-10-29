<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use Eventjuicer\Services\Resolver;
use Eventjuicer\Repositories\ParticipantRepository;

use Eventjuicer\Repositories\Criteria\BelongsToGroup;
use Eventjuicer\Repositories\Criteria\BelongsToOrganizer;
use Eventjuicer\Repositories\Criteria\SortByDesc;

use Eventjuicer\Services\Revivers\ParticipantSendable;

use Eventjuicer\Models\ParticipantFields;


class SmsDisbelievers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:disbelievers 

        {--domain=} 
    
    ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ParticipantRepository $repo, ParticipantSendable $sendable)
    {

        $domain = $this->option("domain");
    
        $errors = [];

        if(empty( $domain )) {
            $errors[] = "--domain= must be provided!";
        }

        if(!empty($errors))
        {
            foreach($errors as $error){
                $this->error($error);
            }
            return;
        }


        $scope = $this->choice('Define scope: ', ['group', 'organizer'], 0);

        $route          = new Resolver($domain);

        $eventId        = $route->getEventId();
        $group_id       = $route->getGroupId();
        $organizer_id   = $route->getOrganizerId();


        if($scope === "organizer")
        {
            $this->info("Scope: organizer.");
            $repo->pushCriteria( new BelongsToOrganizer( $organizer_id ));
        }
        else
        {
            $this->info("Scope: group.");
            $repo->pushCriteria( new BelongsToGroup( $group_id ));
        }

        $repo->pushCriteria( new SortByDesc("id") );

        $all = $repo->all();

        $this->info("Found " . $all->count() . " records in the this scope!");

        $excludes = $all->where("event_id", $eventId )->pluck("email")->all();

        $this->info("Skipping " . count($excludes) . " matches with active event...");

        //as we will ignore doubles in SMSAPI
        $sendable->checkUniqueness(false);
        //as we control it some where else!
        $sendable->checkDeliveries(false);

        $filtered =  $sendable->filter($all, $eventId, $excludes);

        $this->info( "Found " . $filtered->count() . " unique records checked by emails..." );

        $done = 0;

        $phones = array();

        foreach($filtered as $participant)
        {
            $query = ParticipantFields::where("participant_id", $participant->id)->where("field_id", 8)->get();

            if(!$query->count()){
                continue;
            }

            $phone = trim( $query->first()->field_value );

            $phone = str_replace(" ", "", $phone);

            if(empty($phone)){
                continue;
            }

            $phones[] = $phone;

            if($done % 1000 === 0)
            {
        
                $this->info("Dispatched: " . $done);
            }

            $done++;
        }

        $filename = "export".md5(time() . $eventId).".txt";


        file_put_contents(
            app()->basePath("storage/app/public/" . $filename), 
            implode( "\n", $phones )
        );

        $this->info("All done! " . "Check storage/" . $filename);
    }





}