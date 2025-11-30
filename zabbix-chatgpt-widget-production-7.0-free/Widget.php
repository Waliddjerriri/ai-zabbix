<?php
/*
** Copyright (C) 2001-2025 initMAX s.r.o.
**
** This program is free software: you can redistribute it and/or modify it under the terms of
** the GNU Affero General Public License as published by the Free Software Foundation, version 3.
**
** This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
** without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
** See the GNU Affero General Public License for more details.
**
** You should have received a copy of the GNU Affero General Public License along with this program.
** If not, see <https://www.gnu.org/licenses/>.
**/


namespace Modules\ChatGPT;

use Modules\ChatGPT\Services\WidgetTranslator;
use Zabbix\Core\CWidget;

class Widget extends CWidget 
{
    public function getDefaultName(): string {
		return WidgetTranslator::translate('widget.name');
	}
}
