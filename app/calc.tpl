{extends file="../templates/main.tpl"}



{block name=content}
<section id="footer">
	<div class="inner">
			<h2 class="major">Kalkulator</h2>

		<form action="{$app_root}/app/calc.php" method="post">
			<fieldset>
				<div class="fields">
				<div class="field">
			<label for="id_kwota">Kwota kredytu</label>
			<input id="id_kwota" type="text" name="kwota" value="{$kwota}"/>
				</div>
				<div>
			<label for="id_lata">Na ile lat:</label>
			<input id="id_lata" type="text" name="lata" value="{$lata}"/>
				</div>
					<div class="field">
			<label for="id_procent">Oprocentowanie:</label>
			<input id="id_procent" type="text" name="procent" value="{$procent}"/>
				</div>
					<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
				</div>
			</fieldset>
		</div>

	<div class="messages">

	{if isset($messages)}
		{if count($messages) > 0}
			<h4>Wystąpiły błędy: </h4>
			<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #f88; width:25em;">
				{foreach  $messages as $msg}
					{strip}
						<li>{$msg}</li>
					{/strip}
				{/foreach}
			</ol>
		{/if}
	{/if}

	{if isset($result)}
		<h4>Twoja miesięczna rata to: </h4>
		<ol style="margin-top: 1em; padding: 1em 1em 1em 2em; border-radius: 0.5em; background-color: #167003; width:25em;">
			{$result}
		</ol>
	{/if}

</div>

{/block}


