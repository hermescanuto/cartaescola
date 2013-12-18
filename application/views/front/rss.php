<?php
header("Content-type: application/xml;charset=utf-8");

?>
<?xml version="1.0" encoding="UTF-8"?>


<rss  xmlns:content="http://purl.org/rss/1.0/modules/content/" 
      xmlns:wfw="http://wellformedweb.org/CommentAPI/" 
      xmlns:dc="http://purl.org/dc/elements/1.1/" 
      xmlns:atom="http://www.w3.org/2005/Atom" 
      xmlns:sy="http://purl.org/rss/1.0/modules/syndication/" 
      xmlns:slash="http://purl.org/rss/1.0/modules/slash/" 
      version="2.0" >
  <channel>


   <atom:link href="{base_url}rss" rel="self" type="application/rss+xml" />
   
    <title>{rss_titulo}</title>
    <link>{base_url}</link>    
    <description>{rss_descricao}</description>
    <language>pt-br</language>

    <copyright>{rss_titulo} - Todos os direitos reservados - <?php echo gmdate("Y", time()); ?></copyright>
    <generator>codeigniter</generator>
    <lastBuildDate>{rss_data}</lastBuildDate>

    
    {recordset}
    <item>
     <category>{tipo_conteudo}</category>
     <link>{base_url}single/show/{id}</link>
     <title><![CDATA[ {titulo} ]]></title>    
     <guid isPermaLink="false">{base_url}single/show/{id}</guid>             
     <description>{descricao}</description>      
     <content:encoded><![CDATA[ {texto} ]]></content:encoded>
    
   </item>        
   {/recordset}


 </channel>
</rss>


