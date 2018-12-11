<?php
namespace Joshi\SimpleNews\Block\Latest;

use Joshi\SimpleNews\Block\Latest;
use Joshi\SimpleNews\Model\System\Config\LatestNews\Position;

class Right extends Latest {
	public function _construct() {
		$position = $this->_dataHelper->getLatestNewsBlockPosition();

		if ($position == Position::RIGHT) {
			$this->setTemplate('Joshi_SimpleNews::latest.phtml');
		}
	}
}