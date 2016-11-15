<?php
namespace App\Libraries;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;

class LayoutManager
{
    /**
     * @var Collection
     */
    var $_banner = true;

    public function setNoBanner () {
        $this->_banner = false;
    }

    public function getBanner () {
        return $this->_banner;
    }

}
