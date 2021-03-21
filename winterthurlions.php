<?php
namespace Grav\Theme;

use Grav\Common\Theme;

class Winterthurlions extends Theme
{

    public function onThemeInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $this->enable([
            'onPageInitialized' => ['onPageInitialized', 0]
        ]);
    }

    public function onPageInitialized()
    {
        // Redirect to external_url if external page template
        $template = $this->grav['page']->template();
        if ($template === 'external' && isset($this->grav['page']->header()->external_url)) {
            $url = $this->grav['page']->header()->external_url;
            $this->grav->redirect($url);
        }
    }
}
