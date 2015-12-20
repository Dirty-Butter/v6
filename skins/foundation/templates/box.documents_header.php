{if isset($DOCUMENTS_HEADER) && count($DOCUMENTS_HEADER) > 0}
<nav class="top-bar category-nav" data-topbar="" id="box-documents-header">
  <ul class="title-area">
     <li class="name"></li>
     <li class="toggle-topbar left"><a href="">{$LANG.documents.document_header_title} <i class="fa fa-caret-down"></i></a></li>
  </ul>
  <section class="top-bar-section">
     <ul class="left">
        <li class="show-for-medium-up"><a href="{$STORE_URL}" title="{$LANG.common.home}"><i class="fa fa-home"></i></a></li>
		{foreach from=$DOCUMENTS_HEADER item=document}
			<li><a href="{$document.doc_url}" title="{$document.doc_name}" {if $document.doc_url_openin}target="_blank"{/if}>{$document.doc_name}</a></li>
		{/foreach}
<li><a href="{$STORE_URL}/testimonials.html">{$LANG.testimonials.testimonials_page_title}</a></li>
		{if isset($CONTACT_URL)}
			<li><a href="{$CONTACT_URL}" title="{$LANG.documents.document_contact}">{$LANG.documents.document_contact}</a></li>
		{/if}
     </ul>
  </section>
</nav>
{/if}