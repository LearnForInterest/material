<?php
    // Channel.php 部分代码
    namespace Entity;
    use Entity\Repository\ChannelRepository;

    /**
    * Channel
    *
    * @Table(name="channel", options={"collate"="utf8_general_ci","charset"="utf8"})
    * @Entity(repositoryClass="Entity\Repository\ChannelRepository")
    */
class Channel extends ChannelRepository{

    /**
    * @var integer
    *
    * @Column(name="channel_id", type="integer", nullable=false, options={"comment": "渠道id"})
    * @Id
    * @GeneratedValue(strategy="NONE")
    */
    private $channelId;

    /**
    * @var integer
    *
    * @Column(name="channel_tag", type="integer", nullable=false, options={"comment": "渠道标识"})
    * @Id
    * @GeneratedValue(strategy="NONE")
    */
    private $channelTag;

    /**
    * @var string
    *
    * @Column(name="channel_name", type="string", length=128, nullable=false, options={"comment": "渠道名称"})
    */
    private $channelName;

    /**
    * @var string
    *
    * @Column(name="channel_time", type="datetime", nullable=false, options={"comment": "渠道创建时间"})
    */
    private $channelTime;

    public function __construct()
    {
        $this->channelTime = new \DateTime('now');
    }

    
    /**
     * Set channelId
     *
     * @param integer $channelId
     *
     * @return Channel
     */
    public function setChannelId($channelId)
    {
        $this->channelId = $channelId;

        return $this;
    }

    /**
     * Get channelId
     *
     * @return integer
     */
    public function getChannelId()
    {
        return $this->channelId;
    }

    /**
     * Set channelTag
     *
     * @param integer $channelTag
     *
     * @return Channel
     */
    public function setChannelTag($channelTag)
    {
        $this->channelTag = $channelTag;

        return $this;
    }

    /**
     * Get channelTag
     *
     * @return integer
     */
    public function getChannelTag()
    {
        return $this->channelTag;
    }

    /**
     * Set channelName
     *
     * @param string $channelName
     *
     * @return Channel
     */
    public function setChannelName($channelName)
    {
        $this->channelName = $channelName;

        return $this;
    }

    /**
     * Get channelName
     *
     * @return string
     */
    public function getChannelName()
    {
        return $this->channelName;
    }

    /**
     * Set channelTime
     *
     * @param \DateTime $channelTime
     *
     * @return Channel
     */
    public function setChannelTime($channelTime)
    {
        $this->channelTime = $channelTime;

        return $this;
    }

    /**
     * Get channelTime
     *
     * @return \DateTime
     */
    public function getChannelTime()
    {
        return $this->channelTime;
    }
}
