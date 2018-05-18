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

        $channel->setChannelId('2')->setChannelTag('13')->setChannelName('ali');

        $this->em->persist( $channel );
        $this->em->flush();
    }

    public function query(){
        $id = 1;
        //$finarr = array('channelId'=> '1');
        $limit  = 20;
        $offset = 1;

        /**
         * @var  $channelInfo Entity\Channel
         * @var  $channelOneBy Entity\Channel
         */

        $channelRepository = $this->em->getRepository('Entity\Channel');

        $channelAll  	= $channelRepository->findAll();
        //var_dump($channelAll);
        //$channelInfo 	= $channelRepository->find( 'channelId','1');
        //var_dump($channelInfo);

        ##############################################################################
        $findArr = array('channelName' => 'test');
        $findArr = array('channelId' => '1');
        $channelOneBy 	= $channelRepository->findOneBy([
            'channelName' => 'baidu'
        ], [
            'channelId' => 'DESC'
        ]);
        $channelOneBy 	= $channelRepository->findOneBy(array('channelName' => 'test', 'channelId' => '1'));
        ##############################################################################
        //,
        $channelBy		= $channelRepository->findBy($findArr,array(),$limit, $offset);

        /** @var $value Entity\Channel */
        //var_dump($channelOneBy);
        var_dump($channelBy);
        foreach( $channelBy as $value )
        {
            echo $value->getChannelName();
        }

        //echo $channelInfo->getChannelName();

    }
}
