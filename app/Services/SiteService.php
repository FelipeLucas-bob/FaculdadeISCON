<?php

namespace App\Services;

use App\Models\SiteModel;
use App\Models\TalkModel;
use App\Repositories\SiteRepository;
use Illuminate\Database\Eloquent\Collection;

Class SiteService
{
    protected $siteRepository; 

    public function __construct(SiteRepository $siteRepository)
    {
        $this->siteRepository = $siteRepository;
    }

    public function getAll(): Collection
    {
        return $this->siteRepository->getAll();
    }

    public function createTalk(array $data)
    {

        $talk = new TalkModel();
        $talk->name = $data['name'];
        $talk->phone = $data['phone'];
        $talk->email = $data['email'];
        $talk->subject = $data['subject'];
        $talk->message = $data['message'];

        return $this->siteRepository->createTalk($talk);
    }

    

}