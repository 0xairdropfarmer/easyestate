<?php $setting = get_setting(); 
$setting_title = $setting->title;
	$setting_desc = "Description here";
	$setting_keywords = "Keywords here";
?>
<head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
		<title><?php echo $setting->title; ?> </title>
        <meta name="keywords" content="easyestate, real estate, rent, sale, houses, flats, villas" />
        <meta name="description" content="Easy Esrate Real estate protal">
        <meta name="author" content="arfan67@gmail.com">   
        
		<meta property="og:title" content="{{ $title or $setting_title }}" />
		<meta property="og:description" content="{{ $description or $setting_desc }}" />
		<meta property="og:url" content="{{$url or url('/')}}" />
		<meta property="og:type" content="website" />
		<meta property="og:image" content="{{ $image or 'https://drool.ch/og/Drool300x200.png' }} " />
		<meta property="fb:app_id" content="1081699341897899" />

		<meta name="twitter:card" content="summary">
		<meta name="twitter:title" content="{{ $title or $setting_title }}">
		<meta name="twitter:image" content="{{ $image or 'https://drool.ch/og/Drool300x200.png' }}">
		<meta name="twitter:description" content="{{ $description or $setting_desc }}">
		<meta name="twitter:site" content="letsdrool">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width,  minimum-scale=1,  maximum-scale=1">
        <!-- Your styles -->
        <link href="{{url('assets/frontend/css/style.css')}}" rel="stylesheet" media="screen">  

        <!-- Skins Theme -->
		<?php $themecolor = "red"; 
			$theme_color =  $setting->theme_color;
			if(!empty($theme_color)) { 
				$themecolor = $theme_color;
			}
		?>
        <link href="<?php echo url("assets/frontend/css/skins/$themecolor/$themecolor.css"); ?>" rel="stylesheet" media="screen" class="skin">

        <!-- Favicons -->
        <link rel="shortcut icon" href="{{url('assets/frontend/img/icons/favicon.html')}}">
        <link rel="apple-touch-icon" href="{{url('assets/frontend/img/icons/apple-touch-icon.html')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{url('assets/frontend/img/icons/apple-touch-icon-72x72.html')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{url('assets/frontend/img/icons/apple-touch-icon-114x114.html')}}">  

    
        <!-- Skins Changer-->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
		 <script src="{{url('assets/frontend/js/jquery.min.js')}}"></script> 
		
    </head>