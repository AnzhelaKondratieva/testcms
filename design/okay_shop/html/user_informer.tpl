{* User account *}
{if $user}
	<a class="account__link" href="{url_generator route="user"}">
        <i class="mdi mdi-account-check"></i>
		<span class="account__text" data-language="index_account">{$lang->index_account} </span>
		<span class="account__name">{$user->name|escape}</span>
		{if $orders['paid'] == 1 && $orders_status['is_close'] == 1}
			<span class="account__order">{count($orders)}</span>
		{/if}
	</a>
{else}
	<a class="account__link" href="javascript:;" onclick="document.location.href = '{url_generator route="login"}'" title="{$lang->index_login}">
        <i class="mdi mdi-account"></i>
		<span class="account__text" data-language="index_account">{$lang->index_account} </span>
		<span class="account__login" data-language="index_login">{$lang->index_login}</span>
	</a>
{/if}