<?php
header("Content-type: application/xml;charset=utf-8");

?>

<rss version="2.0"  xmlns:atom="http://www.w3.org/2005/Atom"  >
    
    <atom:link href="{base_url}rss" rel="self" type="application/rss+xml" />
    
    
    <channel>
        
        <title>{rss_titulo}</title>
        <link>{rss_link}</link>    
        <description>{rss_descricao}</description>
        <language>pt-br</language>

        <copyright>{rss_titulo} - Todos os direitos reservados - <?php echo gmdate("Y", time()); ?></copyright>
        <generator>codeigniter</generator>
        <lastBuildDate>{rss_data}</lastBuildDate>
        <ttl>20</ttl>
    
        {recordset}
            <item>
               <category>{tipo_conteudo}</category>
              <title>{titulo}</title>
              <link>{base_url}single/show/{id}</link>
              <guid>{base_url}single/show/{id}</guid>
              <description>{descricao}</description>      
            </item>        
        {/recordset}


    </channel>
</rss>


