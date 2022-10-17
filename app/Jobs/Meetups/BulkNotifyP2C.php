<?php

namespace App\Jobs\Meetups;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;


use Illuminate\Support\Collection;
use Eventjuicer\Repositories\MeetupRepository;
use Illuminate\Support\Facades\Mail;
use App\Mail\Meetups\Bulk;
use Carbon\Carbon;
use Eventjuicer\Services\Meetups\Sendable;
use Eventjuicer\Models\Company;

class BulkNotifyP2C implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $company;

    public function __construct(Company $company)
    {
        $this->company = $company;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(MeetupRepository $repo)
    {

        //double check!!!!

        $filtered = $this->meetups->filter(function($meetup)
        {

            return (new Sendable($meetup))->check();

        });

        if(! $filtered->count())
        {
            return true;
        }


        $participant = $this->meetups->first()->participant;

        Mail::send(new Bulk( $participant, $this->meetups->count() ) );

        foreach($this->meetups as $meetup)
        {
            if(! env("MAIL_TEST", true))
            {
                $repo->updateAfterSent($meetup->id);
            }
        }

    }
}
