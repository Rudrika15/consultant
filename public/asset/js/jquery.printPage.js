<!DOCTYPE html>
<!-- saved from url=(0048)https://searchcode.com/codesearch/view/37479427/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="icon" href="https://searchcode.com/static/favicon.ico">
    <link rel="stylesheet" href="./jquery.printPage_files/mvp.css">

    
    <meta name="description" content="searchcode is a free source code search engine. Code snippets and open source (free sofware) repositories are indexed and searchable.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>jquery.printPage.js | searchcode</title>
    <style>
    nav {
        margin-bottom: 0 !important;
    }
    </style>
<div id="_bsa_srv-CVAIVKJU_0"></div><script type="text/javascript" async="" src="./jquery.printPage_files/analytics.js.download"></script><script id="_carbonads_projs" type="text/javascript" src="./jquery.printPage_files/CKYIEKQE.json"></script></head>

<body>
    <header>
        <nav>
            <a href="https://searchcode.com/"><img src="./jquery.printPage_files/searchcode_logo.png" alt="searchcode small logo" height="30"></a>
            <ul>
                <li><a href="https://searchcode.com/">Home</a></li>
                <li><a href="https://searchcode.com/about/">About</a></li>
                <li><a href="https://searchcode.com/api/">API</a></li>
                <li><a href="https://searchcodeserver.com/" target="_blank">searchcode server</a></li>
            </ul>
        </nav>
    </header>
    
<div style="display:none;">
PageRenderTime 12ms
CodeModel.GetById 1ms
app.highlight 7ms
RepoModel.GetById 1ms
app.codeStats 1ms
</div>
<main>
    <script src="./jquery.printPage_files/monetization.js.download" type="text/javascript"></script>
    <div id="ad_top"></div>
    <script>
    (function(){
    
    _bsa.init('default', 'CVAIVKJU', 'placement:demo', {
      target: '#ad_top',
      align: 'horizontal',
      disable_css: 'true'
    });
    })();
    </script>

    <h4>/web/components/print/jquery.printPage.js</h4>

    <div>
    <script async="" type="text/javascript" src="./jquery.printPage_files/carbon.js.download" id="_carbonads_js"></script><div id="carbonads"><span><span class="carbon-wrap"><a href="https://searchcodeserver.com/" class="carbon-img" target="_blank" rel="noopener sponsored"><img src="./jquery.printPage_files/5cb237e80a03ae0d96d41f861b7150d2.png" alt="ads via Carbon" border="0" height="100" width="130" style="max-width: 130px;"></a><a href="https://searchcodeserver.com/" class="carbon-text" target="_blank" rel="noopener sponsored">Run searchcode locally on your own private repositories. Try for free.</a></span><a href="http://carbonads.net/?utm_source=searchcodecom&amp;utm_medium=ad_via_link&amp;utm_campaign=in_unit&amp;utm_term=carbon" class="carbon-poweredby" target="_blank" rel="noopener sponsored">ads via Carbon</a></span></div>
    <style>#carbonads{margin: 0 auto;padding: 1em;max-width: 26em !important;border: solid 2px #428bca;border-radius: 3px;font-size: .9em;font-family: Verdana, sans-serif;line-height: 1.5;} #carbonads * {display: block;overflow: hidden;} .carbon-img{float: left; margin-right: 1em !important; margin-bottom: .5em;} .carbon-text{float: left;max-width: 12em; text-align: left;} .carbon-poweredby{margin-top: -1em;text-align: right;font-size: .9em !important;}</style>
    </div>

    

    <a href="https://bitbucket.org/dudesl/pyresys">https://bitbucket.org/dudesl/pyresys</a><br>
    <small>JavaScript | 88 lines |
    55 code |
    5 blank |
    28 comment |
    1 complexity | 9dfeb4db0b0623150a251015f68b1c28 MD5 |
    <a href="https://searchcode.com/codesearch/raw/37479427/">raw file</a></small>

    

    
    <pre class="chroma"><span class="ln"> 1</span><span class="cm">/**
</span><span class="ln"> 2</span><span class="cm"> * jQuery printPage Plugin
</span><span class="ln"> 3</span><span class="cm"> * @version: 1.0
</span><span class="ln"> 4</span><span class="cm"> * @author: Cedric Dugas, http://www.position-absolute.com
</span><span class="ln"> 5</span><span class="cm"> * @licence: MIT
</span><span class="ln"> 6</span><span class="cm"> * @desciption: jQuery page print plugin help you print your page in a better way
</span><span class="ln"> 7</span><span class="cm"> */</span>
<span class="ln"> 8</span>
<span class="ln"> 9</span><span class="p">(</span><span class="kd">function</span><span class="p">(</span> <span class="nx">$</span> <span class="p">)</span><span class="p">{</span>
<span class="ln">10</span>  <span class="nx">$</span><span class="p">.</span><span class="nx">fn</span><span class="p">.</span><span class="nx">printPage</span> <span class="o">=</span> <span class="kd">function</span><span class="p">(</span><span class="nx">options</span><span class="p">)</span> <span class="p">{</span>
<span class="ln">11</span>    <span class="c1">// EXTEND options for this button
</span><span class="ln">12</span><span class="c1"></span>    <span class="kd">var</span> <span class="nx">pluginOptions</span> <span class="o">=</span> <span class="p">{</span>
<span class="ln">13</span>      <span class="nx">attr</span> <span class="o">:</span> <span class="s2">"href"</span><span class="p">,</span>
<span class="ln">14</span>      <span class="nx">url</span> <span class="o">:</span> <span class="kc">false</span><span class="p">,</span>
<span class="ln">15</span>      <span class="nx">message</span><span class="o">:</span> <span class="s2">"Please Wait...."</span> 
<span class="ln">16</span>    <span class="p">}</span><span class="p">;</span>
<span class="ln">17</span>    <span class="nx">$</span><span class="p">.</span><span class="nx">extend</span><span class="p">(</span><span class="nx">pluginOptions</span><span class="p">,</span> <span class="nx">options</span><span class="p">)</span><span class="p">;</span>
<span class="ln">18</span>
<span class="ln">19</span>    <span class="k">this</span><span class="p">.</span><span class="nx">live</span><span class="p">(</span><span class="s2">"click"</span><span class="p">,</span> <span class="kd">function</span><span class="p">(</span><span class="p">)</span><span class="p">{</span>  <span class="nx">loadPrintDocument</span><span class="p">(</span><span class="k">this</span><span class="p">,</span> <span class="nx">pluginOptions</span><span class="p">)</span><span class="p">;</span> <span class="k">return</span> <span class="kc">false</span><span class="p">;</span>  <span class="p">}</span><span class="p">)</span><span class="p">;</span>
<span class="ln">20</span>    
<span class="ln">21</span>    <span class="cm">/**
</span><span class="ln">22</span><span class="cm">     * Load &amp; show message box, call iframe
</span><span class="ln">23</span><span class="cm">     * @param {jQuery} el - The button calling the plugin
</span><span class="ln">24</span><span class="cm">     * @param {Object} pluginOptions - options for this print button
</span><span class="ln">25</span><span class="cm">     */</span>   
<span class="ln">26</span>    <span class="kd">function</span> <span class="nx">loadPrintDocument</span><span class="p">(</span><span class="nx">el</span><span class="p">,</span> <span class="nx">pluginOptions</span><span class="p">)</span><span class="p">{</span>
<span class="ln">27</span>      <span class="nx">$</span><span class="p">(</span><span class="s2">"body"</span><span class="p">)</span><span class="p">.</span><span class="nx">append</span><span class="p">(</span><span class="nx">components</span><span class="p">.</span><span class="nx">messageBox</span><span class="p">(</span><span class="nx">pluginOptions</span><span class="p">.</span><span class="nx">message</span><span class="p">)</span><span class="p">)</span><span class="p">;</span>
<span class="ln">28</span>      <span class="nx">$</span><span class="p">(</span><span class="s2">"#printMessageBox"</span><span class="p">)</span><span class="p">.</span><span class="nx">css</span><span class="p">(</span><span class="s2">"opacity"</span><span class="p">,</span> <span class="mi">0</span><span class="p">)</span><span class="p">;</span>
<span class="ln">29</span>      <span class="nx">$</span><span class="p">(</span><span class="s2">"#printMessageBox"</span><span class="p">)</span><span class="p">.</span><span class="nx">animate</span><span class="p">(</span><span class="p">{</span><span class="nx">opacity</span><span class="o">:</span><span class="mi">1</span><span class="p">}</span><span class="p">,</span> <span class="mi">300</span><span class="p">,</span> <span class="kd">function</span><span class="p">(</span><span class="p">)</span> <span class="p">{</span> <span class="nx">addIframeToPage</span><span class="p">(</span><span class="nx">el</span><span class="p">,</span> <span class="nx">pluginOptions</span><span class="p">)</span><span class="p">;</span> <span class="p">}</span><span class="p">)</span><span class="p">;</span>
<span class="ln">30</span>    <span class="p">}</span>
<span class="ln">31</span>    <span class="cm">/**
</span><span class="ln">32</span><span class="cm">     * Inject iframe into document and attempt to hide, it, can't use display:none
</span><span class="ln">33</span><span class="cm">     * You can't print if the element is not dsplayed
</span><span class="ln">34</span><span class="cm">     * @param {jQuery} el - The button calling the plugin
</span><span class="ln">35</span><span class="cm">     * @param {Object} pluginOptions - options for this print button
</span><span class="ln">36</span><span class="cm">     */</span>
<span class="ln">37</span>    <span class="kd">function</span> <span class="nx">addIframeToPage</span><span class="p">(</span><span class="nx">el</span><span class="p">,</span> <span class="nx">pluginOptions</span><span class="p">)</span><span class="p">{</span>
<span class="ln">38</span>
<span class="ln">39</span>        <span class="kd">var</span> <span class="nx">url</span> <span class="o">=</span> <span class="p">(</span><span class="nx">pluginOptions</span><span class="p">.</span><span class="nx">url</span><span class="p">)</span> <span class="o">?</span> <span class="nx">pluginOptions</span><span class="p">.</span><span class="nx">url</span> <span class="o">:</span> <span class="nx">$</span><span class="p">(</span><span class="nx">el</span><span class="p">)</span><span class="p">.</span><span class="nx">attr</span><span class="p">(</span><span class="nx">pluginOptions</span><span class="p">.</span><span class="nx">attr</span><span class="p">)</span><span class="p">;</span>
<span class="ln">40</span>
<span class="ln">41</span>        <span class="k">if</span><span class="p">(</span><span class="o">!</span><span class="nx">$</span><span class="p">(</span><span class="s1">'#printPage'</span><span class="p">)</span><span class="p">[</span><span class="mi">0</span><span class="p">]</span><span class="p">)</span><span class="p">{</span>
<span class="ln">42</span>          <span class="nx">$</span><span class="p">(</span><span class="s2">"body"</span><span class="p">)</span><span class="p">.</span><span class="nx">append</span><span class="p">(</span><span class="nx">components</span><span class="p">.</span><span class="nx">iframe</span><span class="p">(</span><span class="nx">url</span><span class="p">)</span><span class="p">)</span><span class="p">;</span>
<span class="ln">43</span>          <span class="nx">$</span><span class="p">(</span><span class="s1">'#printPage'</span><span class="p">)</span><span class="p">.</span><span class="nx">bind</span><span class="p">(</span><span class="s2">"load"</span><span class="p">,</span><span class="kd">function</span><span class="p">(</span><span class="p">)</span> <span class="p">{</span>  <span class="nx">printit</span><span class="p">(</span><span class="p">)</span><span class="p">;</span>  <span class="p">}</span><span class="p">)</span>
<span class="ln">44</span>        <span class="p">}</span><span class="k">else</span><span class="p">{</span>
<span class="ln">45</span>          <span class="nx">$</span><span class="p">(</span><span class="s1">'#printPage'</span><span class="p">)</span><span class="p">.</span><span class="nx">attr</span><span class="p">(</span><span class="s2">"src"</span><span class="p">,</span> <span class="nx">url</span><span class="p">)</span><span class="p">;</span>
<span class="ln">46</span>        <span class="p">}</span>
<span class="ln">47</span>    <span class="p">}</span>
<span class="ln">48</span>    <span class="cm">/*
</span><span class="ln">49</span><span class="cm">     * Call the print browser functionnality, focus is needed for IE
</span><span class="ln">50</span><span class="cm">     */</span>
<span class="ln">51</span>    <span class="kd">function</span> <span class="nx">printit</span><span class="p">(</span><span class="p">)</span><span class="p">{</span>
<span class="ln">52</span>      <span class="nx">frames</span><span class="p">[</span><span class="s2">"printPage"</span><span class="p">]</span><span class="p">.</span><span class="nx">focus</span><span class="p">(</span><span class="p">)</span><span class="p">;</span>
<span class="ln">53</span>      <span class="nx">frames</span><span class="p">[</span><span class="s2">"printPage"</span><span class="p">]</span><span class="p">.</span><span class="nx">print</span><span class="p">(</span><span class="p">)</span><span class="p">;</span>
<span class="ln">54</span>      <span class="nx">unloadMessage</span><span class="p">(</span><span class="p">)</span><span class="p">;</span>
<span class="ln">55</span>    <span class="p">}</span>
<span class="ln">56</span>    <span class="cm">/*
</span><span class="ln">57</span><span class="cm">     * Hide &amp; Delete the message box with a small delay
</span><span class="ln">58</span><span class="cm">     */</span>
<span class="ln">59</span>    <span class="kd">function</span> <span class="nx">unloadMessage</span><span class="p">(</span><span class="p">)</span><span class="p">{</span>
<span class="ln">60</span>      <span class="nx">$</span><span class="p">(</span><span class="s2">"#printMessageBox"</span><span class="p">)</span><span class="p">.</span><span class="nx">delay</span><span class="p">(</span><span class="mi">1000</span><span class="p">)</span><span class="p">.</span><span class="nx">animate</span><span class="p">(</span><span class="p">{</span><span class="nx">opacity</span><span class="o">:</span><span class="mi">0</span><span class="p">}</span><span class="p">,</span> <span class="mi">300</span><span class="p">,</span> <span class="kd">function</span><span class="p">(</span><span class="p">)</span><span class="p">{</span>
<span class="ln">61</span>        <span class="nx">$</span><span class="p">(</span><span class="k">this</span><span class="p">)</span><span class="p">.</span><span class="nx">remove</span><span class="p">(</span><span class="p">)</span><span class="p">;</span>
<span class="ln">62</span>      <span class="p">}</span><span class="p">)</span><span class="p">;</span>
<span class="ln">63</span>    <span class="p">}</span>
<span class="ln">64</span>    <span class="cm">/*
</span><span class="ln">65</span><span class="cm">     * Build html compononents for thois plugin
</span><span class="ln">66</span><span class="cm">     */</span>
<span class="ln">67</span>    <span class="kd">var</span> <span class="nx">components</span> <span class="o">=</span> <span class="p">{</span>
<span class="ln">68</span>      <span class="nx">iframe</span><span class="o">:</span> <span class="kd">function</span><span class="p">(</span><span class="nx">url</span><span class="p">)</span><span class="p">{</span>
<span class="ln">69</span>        <span class="k">return</span> <span class="s1">'&lt;iframe id="printPage" name="printPage" src='</span><span class="o">+</span><span class="nx">url</span><span class="o">+</span><span class="s1">' style="position:absolute;top:0px; left:0px;width:0px; height:0px;border:0px;overfow:none; z-index:-1"&gt;&lt;/iframe&gt;'</span><span class="p">;</span>
<span class="ln">70</span>      <span class="p">}</span><span class="p">,</span>
<span class="ln">71</span>      <span class="nx">messageBox</span><span class="o">:</span> <span class="kd">function</span><span class="p">(</span><span class="nx">message</span><span class="p">)</span><span class="p">{</span>
<span class="ln">72</span>        <span class="k">return</span> <span class="s2">"&lt;div id='printMessageBox' style='\
</span><span class="ln">73</span><span class="s2">          position:fixed;\
</span><span class="ln">74</span><span class="s2">		  z-index:2000;\
</span><span class="ln">75</span><span class="s2">          top:50%; left:50%;\
</span><span class="ln">76</span><span class="s2">          text-align:center;\
</span><span class="ln">77</span><span class="s2">          margin: -60px 0 0 -155px;\
</span><span class="ln">78</span><span class="s2">          width:310px; height:120px; font-size:16px; padding:10px; color:#222; font-family:helvetica, arial;\
</span><span class="ln">79</span><span class="s2">          opacity:0;\
</span><span class="ln">80</span><span class="s2">          background:#fff url(data:image/gif;base64,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) center 40px no-repeat;\
</span><span class="ln">81</span><span class="s2">          border: 6px solid #555;\
</span><span class="ln">82</span><span class="s2">          border-radius:8px; -webkit-border-radius:8px; -moz-border-radius:8px;\
</span><span class="ln">83</span><span class="s2">          box-shadow:0px 0px 10px #888; -webkit-box-shadow:0px 0px 10px #888; -moz-box-shadow:0px 0px 10px #888'&gt;\
</span><span class="ln">84</span><span class="s2">          "</span><span class="o">+</span><span class="nx">message</span><span class="o">+</span><span class="s2">"&lt;/div&gt;"</span><span class="p">;</span>
<span class="ln">85</span>      <span class="p">}</span>
<span class="ln">86</span>    <span class="p">}</span>
<span class="ln">87</span>  <span class="p">}</span><span class="p">;</span>
<span class="ln">88</span><span class="p">}</span><span class="p">)</span><span class="p">(</span> <span class="nx">jQuery</span> <span class="p">)</span><span class="p">;</span>
</pre>
    

    
</main>

    <footer>
        <hr>
        <p>
        <small>searchcode is proudly made in Sydney by <a href="https://www.boyter.org/" target="_blank">ben boyter</a></small>
        </p>
    </footer>

<script async="" src="./jquery.printPage_files/js"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23451493-1');
</script>


</body></html>