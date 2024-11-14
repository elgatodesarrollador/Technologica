<!doctype html>
<html amp lang="en">
  <head>
    <meta charset="utf-8">
    <title>Hello, AMPs</title>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <link rel="canonical" href="https://www.c-direct.com.au/amp.html">
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
    <script type="application/ld+json">
      {
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "headline": "Open-source framework for publishing content",
        "datePublished": "2015-10-07T12:02:41Z",
        "image": [
          "images/logo.gif"
        ]
      }
    </script>
      	<script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
    <style amp-custom>
  /* any custom style goes here */
        body{
            font-family:lato, sans-serif;
        }
      amp-sidebar {
      width: 250px;
      padding-right: 10px;
    }
    .amp-sidebar-image {
      line-height: 100px;
      vertical-align:middle;
    }
    .amp-close-image {
       top: 15px;
       left: 225px;
       cursor: pointer;
    }
    li {
      margin-bottom: 20px;
      list-style: none;
    }
    button {
      margin-left: 20px;
      text-align:right;
        background:lightgray;
        border:none;
        margin:10px;
        padding:10px;
        padding-top:20px;
		padding-bottom:20px;
		text-transform: uppercase;
        font-family:"Open Sans";
        font-weight:500;
        float:right;
        
    }
  body {
    background-color: white;
  }
  amp-img {
   
  }
  .logo{
	  padding-left:20px;
	  padding-right:20px;
     width:150px;
	 padding-top:10px;
	 padding-bottom:10px;
	  float:left;}
        .nofloat{
            clear:both;
        }
        .bodytext{
            margin:10px;
        }
        h2{
                    background: #1d9ad6;
    padding: 8px;
    color: white;
    margin-bottom: 8px;
    margin-top: 0px;
}
        td{
            padding:5px;
        }
        
</style>
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <script async src="https://cdn.ampproject.org/v0.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  </head>
  <body>
     <div class=logo><?php
echo 'Current PHP version: ' . phpversion();
?>
      <amp-img src="images/cdirect_logo_homepage.png" alt="Welcome" height="152" width="360" layout="responsive"></amp-img></div> <div><button on='tap:sidebar.open'>Open menu</button></div><br/><div class="nofloat">
      <amp-img src="images/julydeal.png" alt="Welcome" width="570" height="450" layout="responsive" ></div>
<amp-sidebar id='sidebar'
      layout="nodisplay"
      side="right">
    <amp-img class='amp-close-image'
        src="/img/ic_close_black_18dp_2x.png"
        width="20"
        height="20"
        alt="close sidebar"
        on="tap:sidebar.close"
        role="button"
        tabindex="0"></amp-img>
    <ul>
      <li>
        <a href="/">Home</a>
      </li>
      <li> Nav item 1</li>
      <li>
        <amp-fit-text width="220"
            height="20"
            layout="responsive"
            max-font-size="24">
          Nav item 2 - &lt;amp-fit-text&gt;
        </amp-fit-text>
      </li>
      <li>
        <amp-fit-text width="220"
            height="20"
            layout="responsive"
            max-font-size="24">
          Nav item 3 - &lt;amp-fit-text&gt; longer text
        </amp-fit-text>
      </li>
      <li> Nav item 4 - Image
        <amp-img class='amp-sidebar-image'
            src="/img/favicon.png"
            width="20"
            height="20"
            alt="an image"></amp-img>
      </li>
      <li> Nav item 5</li>
      <li> Nav item 6</li>
    </ul>
  </amp-sidebar>
      <h2>About C-Direct</h2>
      <div class=bodytext>
      C-Direct is a national sales, marketing and distribution company assisting iconic brands in getting products into the market place. We provide in field sales representation and great service to our clients through our internal support team and a diverse range of products.
          <table width="385" border="0" align="center" cellpadding="0" cellspacing="0" >
        <tr>
        <td colspan="3" align="center" ><strong>Iconic Brands!</strong><strong></strong></td>
        </tr>
      <tr>
        <td align="center"><a href="?content=telstra_prepaidplus_mobile" target="_self"><amp-img  src="images/homepage/telstra.png" width="120" height="120"  alt="Telstra Mobile Phones Logo"/></a></td>
        <td align="center"><a href="?content=kodakproducts" target="_self"><amp-img src="images/homepage/kodak_alaris.png" width="120" height="120"  alt="Kodak Photos and Kiosks Logo"/></a></td>
        <td align="center"><a href="?content=movie_tickets" target="_self"><amp-img src="images/homepage/hoyts.png" width="120" height="120"  alt="Hoyts Movie Tickets logo"/></a></td>
      </tr>
      <tr>
        <td class="product_text"></td>
        <td class="product_text"></td>
        <td class="product_text"><amp-img src="images/spacer.gif" width="20" height="10"  alt=""/></td>
      </tr>
      <tr>
        <td align="center"><a href="?content=boost_mobile" target="_self"><amp-img  src="images/homepage/boost.png" width="120" height="120"  alt="Boost Mobile Phones and SIMs Logo"/></a></td>
        <td align="center"><a href="?content=verbatim" target="_self"><amp-img  src="images/homepage/verbatim.png" width="120" height="120"  alt="Verbatim Memory and Storage logo"/></a></td>
        <td align="center"><a href="?content=movie_tickets" target="_self"><amp-img  src="images/homepage/village.png" width="120" height="120"  alt="Villiage Cinemas Movie Tickets"/></a></td>
      </tr>
  </table>
      </div>
  </body>
</html>