<?php
namespace Weixin\Manager;
use Weixin\Helpers;
use Weixin\WeixinException;
use Weixin\Client;
use Weixin\Manager\Msg\Custom;
use Weixin\Manager\Msg\Reply;

/**
 * 发送消息接口
 *
 * @author guoyongrong <handsomegyr@gmail.com>
 */
class Msg
{
	private $_length = 140;
	public function getLength()
	{
		return $this->_length;
	}

	protected  $weixin;
	/**
	 * GET Client object.
	 *
	 * @return Client
	 */
	public function getWeixin()
	{
		return $this->weixin;
	}

	protected $weixinReplyMsgSender;
	/**
	 * GET WeixinReplyMsgSender object.
	 *
	 * @return WeixinReplyMsgSender
	 */
	public function getWeixinReplyMsgSender()
	{
		return $this->weixinReplyMsgSender;
	}

	protected $weixinCustomMsgSender;
	/**
	 * GET WeixinCustomMsgSender object.
	 *
	 * @return WeixinCustomMsgSender
	 */
	public function getWeixinCustomMsgSender()
	{
		return $this->weixinCustomMsgSender;
	}

	public function __construct(Client $weixin,$options=array()) {
		$this->weixin = $weixin;
		//发送被动响应消息发射器
		$this->weixinReplyMsgSender = new WeixinReplyMsgSender($this,$options);
		//发送客服消息发射器
		$this->weixinCustomMsgSender = new WeixinCustomMsgSender($this,$options);
	}

}