<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Channel extends MY_Controller{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        /** @var  $channelRepository Entity\Channel */
        $channelRepository = $this->em->getRepository('Entity\Channel');

        $channelRepository->findAll();

        /** @var  $channel Entity\Channel */
        $channel = new \Entity\Channel();

        $channel->setChannelId('1')->setChannelTag('11')->setChannelName('test');

        $this->em->persist( $channel );
        $this->em->flush();
    }
}
