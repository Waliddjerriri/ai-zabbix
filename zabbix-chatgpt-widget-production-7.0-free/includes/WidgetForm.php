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


namespace Modules\ChatGPT\Includes;

use Modules\ChatGPT\Services\WidgetTranslator;
use Zabbix\Widgets\CWidgetField;
use Zabbix\Widgets\CWidgetForm;
use Zabbix\Widgets\Fields\CWidgetFieldSelect;
use Zabbix\Widgets\Fields\CWidgetFieldTextBox;

/**
 * ChatGPT widget form.
 */

class WidgetForm extends CWidgetForm
{
    public function addFields(): self {
        return $this
            ->addField(
                (new CWidgetFieldSelect('service', WidgetTranslator::translate('form.service.label'), [
                        0 => WidgetTranslator::translate('form.service.option.openai'),
                        1 => WidgetTranslator::translate('form.service.option.custom'),
                    ]))
                    ->setDefault(0)
                    ->setFlags(CWidgetField::FLAG_LABEL_ASTERISK | CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('endpoint', WidgetTranslator::translate('form.endpoint')))
                    ->setDefault('https://api.openai.com/v1/chat/completions')
                    ->setFlags(CWidgetField::FLAG_NOT_EMPTY | CWidgetField::FLAG_LABEL_ASTERISK | CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('token', WidgetTranslator::translate('form.token')))
                    ->setFlags(CWidgetField::FLAG_NOT_EMPTY | CWidgetField::FLAG_LABEL_ASTERISK)
            )
            ->addField(
                (new CWidgetFieldSelect('model', WidgetTranslator::translate('form.model'), [
                        0 => 'GPT-4.1',
                        1 => 'Other models are available in PRO version',
                    ]))
                    ->setDefault(0)
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('temperature', WidgetTranslator::translate('form.temperature')))
                    ->setDefault('1')
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('top_p', WidgetTranslator::translate('form.top_p')))
                    ->setDefault('1')
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('max_tokens', WidgetTranslator::translate('form.max_tokens')))
                    ->setDefault('16')
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
            ->addField(
                (new CWidgetFieldTextBox('n', WidgetTranslator::translate('form.n')))
                    ->setDefault('1')
                    ->setFlags(CWidgetField::FLAG_DISABLED)
            )
        ;
    }
}
