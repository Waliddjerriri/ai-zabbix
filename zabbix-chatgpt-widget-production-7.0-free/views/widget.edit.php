<?php declare(strict_types = 0);

use Modules\ChatGPT\Services\WidgetTranslator;
use Modules\ChatGPT\Widget;

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


/**
 * ChatGPT widget form view.
 *
 * @var CView $this
 * @var array $data
 */

(new CWidgetFormView($data))
    ->addField(
        new CWidgetFieldTextBoxView($data['fields']['token'])
    )
    ->addFieldset((new CWidgetFormFieldsetCollapsibleView(WidgetTranslator::translate('form.advanced-configuration')))
        ->addField(
            new CWidgetFieldSelectView($data['fields']['service'])
        )
        ->addField(
            new CWidgetFieldTextBoxView($data['fields']['endpoint'])
        )
        ->addField(
            new CWidgetFieldSelectView($data['fields']['model'])
        )
        ->addField(
            (new CWidgetFieldTextBoxView($data['fields']['temperature']))
                ->setFieldHint(
                    makeHelpIcon(_('What sampling temperature to use, between 0 and 2. Higher values like 0.8 will make the output more random, while lower values like 0.2 will make it more focused and deterministic.'), 'icon-help')
                )
        )
        ->addField(
            (new CWidgetFieldTextBoxView($data['fields']['top_p']))
                ->setFieldHint(
                    makeHelpIcon(_('An alternative to sampling with temperature, called nucleus sampling, where the model considers the results of the tokens with top_p probability mass. So 0.1 means only the tokens comprising the top 10% probability mass are considered.'), 'icon-help')
                )
        )
        ->addField(
            (new CWidgetFieldTextBoxView($data['fields']['max_tokens']))
                ->setFieldHint(
                    makeHelpIcon(_('The maximum number of tokens to generate in the completion.'), 'icon-help')
                )
        )
        ->addField(
            (new CWidgetFieldTextBoxView($data['fields']['n']))
                ->setFieldHint(
                    makeHelpIcon(_('How many completions to generate for each prompt.'), 'icon-help')
                )
        )
    )
    ->addItem([(new CDiv())->addStyle('height: 2rem;'), new CDiv()])
    ->addItem([
        (new CSpan(_('PRO version')))->addClass(ZBX_STYLE_RIGHT)->addStyle('font-weight: bold;'),
        (new CDiv([
            new CSpan(WidgetTranslator::translate('form.pro-version.feature.choose-chatgpt-model')),
            new CTag('br'),
            new CSpan(WidgetTranslator::translate('form.pro-version.feature.advanced-configuration')),
            new CTag('br'),
            new CSpan(WidgetTranslator::translate('form.pro-version.feature.stop-response-generation')),
            new CTag('br'),
            new CSpan(WidgetTranslator::translate('form.pro-version.feature.copy-button')),
            new CTag('br'),
            new CSpan(WidgetTranslator::translate('form.pro-version.feature.customizable-endpoint')),
        ]))->addStyle('color: #7150f7;')
    ])
    ->addItem([
        new CSpan(''),
        (new CDiv([(new CSpan(WidgetTranslator::translate('form.pro-version.get-pro') . ' '))->addStyle('font-weight: bold;'), new CLink('info@initmax.com', 'mailto:info@initmax.com?subject=Inquiry%20ChatGPT%20PRO%20version')]))->addStyle('padding-top: 2rem;'),
    ])

    ->includeJsFile('widget.edit.js.php')
    ->addJavaScript('widget_chatgpt_form.init();')
	->show();
