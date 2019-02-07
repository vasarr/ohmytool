<?php

namespace App\Observers;

use App\Models\Tool;

class ToolRecommendObserver
{

    public function saving(Tool $tool)
    {
        $tool->description = clean($tool->description, 'tool_recommend');
    }

}
