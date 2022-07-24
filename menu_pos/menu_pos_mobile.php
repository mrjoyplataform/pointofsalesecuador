<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html>
    <head>
        <META http-equiv="Content-Type" content="text/html; charset=<?php echo $_SESSION['scriptcase']['charset_html'] ?>" />
        <title>menu_pos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet"  href="<?php echo $_SESSION["scriptcase"]["menu_pos"]["glo_nm_path_prod"]; ?>/third/jquery.mobile/jquery.mobile-1.2.0.min.css" />
        <link rel="stylesheet"  href="<?php echo $this->url_css; ?>Sc9_Meadow/Sc9_Meadow_menuMobile.css" />
        <link rel="stylesheet"  href="<?php echo $this->url_css; ?>Sc9_Meadow/Sc9_Meadow_menuMobile<?php echo $_SESSION['scriptcase']['reg_conf']['css_dir'] ?>.css" />
        <link rel="stylesheet" href="<?php echo $_SESSION['scriptcase']['menu_pos']['glo_nm_path_prod']; ?>/third/font-awesome/css/all.min.css" type="text/css" media="screen" />
        <script src="<?php echo $_SESSION["scriptcase"]["menu_pos"]["glo_nm_path_prod"]; ?>/third/jquery.mobile/jquery.js"></script>
        <script type="text/javascript">
            $(document).bind("mobileinit", function() {
                $.mobile.page.prototype.options.backBtnText = "<?php echo $this->Nm_lang["lang_btns_prev"]; ?>";
                $.mobile.page.prototype.options.addBackBtn = true;
            });
        </script>
        <script src="<?php echo $_SESSION["scriptcase"]["menu_pos"]["glo_nm_path_prod"]; ?>/third/jquery.mobile/jquery.mobile-1.2.0.min.js"></script>
    <style>
    <?php
    if(isset($menu_pos_menuData["data"]) && is_array($menu_pos_menuData["data"]) && !empty($menu_pos_menuData["data"]))
    {
        foreach($menu_pos_menuData["data"] as $arr_item)
        {
            if(isset($arr_item["icon_color"]) && !empty($arr_item["icon_color"]))
            {
                echo "   #" . $arr_item["id"] . " .icon_fa{ color: ". $arr_item["icon_color"] ."  !important}\r\n";
            }
            if(isset($arr_item["icon_color_hover"]) && !empty($arr_item["icon_color_hover"]))
            {
                echo "   #" . $arr_item["id"] . ":hover .icon_fa{ color: ". $arr_item["icon_color_hover"] ."  !important}\r\n";
            }
            if(isset($arr_item["icon_color_disabled"]) && !empty($arr_item["icon_color_disabled"]))
            {
                echo "   #" . $arr_item["id"] . ".scdisabledmain .icon_fa{ color: ". $arr_item["icon_color_disabled"] ."  !important}\r\n";
                echo "   #" . $arr_item["id"] . ".scdisabledsub .icon_fa{ color: ". $arr_item["icon_color_disabled"] ."  !important}\r\n";
            }
        }
    }
    ?>
    </style>
    </head>
    <body>
        <style>
                .td_corner { width:3px; height:3px; }
        </style>
   <TABLE width="100%" class="scMenuHHeader" cellpadding="0" cellspacing="0">
    <TR>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_te.gif" border="0px"   alt="" /></TD>
     <TD width="*" bgcolor="#000000"></TD>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_td.gif" border="0px"   alt="" /></TD>
    </TR>
    <TR>
     <TD  bgcolor="#000000"></TD>
     <TD style="padding: 0px">
      <TABLE style="padding: 2px; border-spacing: 1px; border-width: 0px;" width="100%" class="scMenuHHeader">
       <TR align="center" class="scMenuHHeaderFont">
        <TD>
         <TABLE style="padding: 0px; border-spacing: 0px; border-width: 0px;" width="100%">
          <TR align="center" valign="middle">
           <TD align="left" rowspan="2">
               
           </TD>
           <TD class="scMenuHHeaderFont">
               
           </TD>
          </TR>
          <TR align="right" valign="middle">
           <TD class="scMenuHHeaderFont">
               
           </TD>
          </TR>
         </TABLE>
        </TD>
       </TR>
      </TABLE>
     </TD>
     <TD  bgcolor="#000000"></TD>
    </TR>
    <TR>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_be.gif" border="0px"   alt="" /></TD>
     <TD width="*" bgcolor="#000000"></TD>
     <TD class="td_corner"><img width="3px" height="3px" src="<?php echo $this->ini->path_img_modelo ?>/nm_round_bd.gif" border="0px"   alt="" /></TD>
    </TR>
   </TABLE>
    <?php
        escreveMenuMobile($menu_pos_menuData["data"], $this->path_imag_apl);
    ?>
	<?php
		function escreveMenuMobile($arr_menu, $path_imag_apl)
		{
			$subSize   = 2;
			$subCount  = array();
			$tabSpace  = 1;
			$intMult   = 2;
			$aMenuItemList = array();
			foreach ($arr_menu as $ind => $resto)
			{
				$aMenuItemList[] = $resto;
			}
			?>
			<ul data-role='listview' data-theme='a'>
			<?php
			for ($i = 0; $i < sizeof($aMenuItemList); $i++)
			{
				echo str_repeat(' ', $tabSpace * $intMult); ?><li><?php
				$tabSpace++;
				$sDisabledClass = '';
				if ('Y' == $aMenuItemList[$i]['disabled'])
				{
					$aMenuItemList[$i]['link']   = '#';
					$aMenuItemList[$i]['target'] = '';
				}
				if ('' != $aMenuItemList[$i]['icon'] && file_exists($path_imag_apl . "/" . $aMenuItemList[$i]['icon']))
				{
					$iconHtml = '<img src="../_lib/img/' . $aMenuItemList[$i]['icon'] . '" alt="' . $aMenuItemList[$cont_menu_list_assoc]['hint'] . '" class="ui-li-icon"  />';
				}
				else
				{
					$iconHtml = '';
				}
				if (empty($aMenuItemList[$i]['link']))
				{
					$aMenuItemList[$i]['link']   = '#';
				}

				if($aMenuItemList[$i]['display'] == 'only_img' && $iconHtml != '')
				{
				    $str_item = $iconHtml;
				}
				elseif($aMenuItemList[$i]['display'] == 'text_img' || empty($aMenuItemList[$i]['display']))
				{
				    if($aMenuItemList[$i]['display_position'] != 'img_right')
				    {
				        $str_item = $iconHtml . $aMenuItemList[$i]['label'];    
				    }
				    else
				    {
				        $str_item = $aMenuItemList[$i]['label'] . $iconHtml;
				    }
				}
				elseif($aMenuItemList[$i]['display'] == 'only_fontawesomeicon')
				{
				    $str_item = "<i class='icon_fa menu__icon ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
				}
				elseif($aMenuItemList[$i]['display'] == 'text_fontawesomeicon')
				{
				    if($aMenuItemList[$i]['display_position'] != 'img_right')
				    {
				        $str_item = "<i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i> ". $aMenuItemList[$i]['label'] ."";
				    }
				    else
				    {
				        $str_item = $aMenuItemList[$i]['label'] ." <i class='icon_fa ". $aMenuItemList[$i]['icon_fa'] ."'></i>";
				    }
				}
				else
				{
				    $str_item = $aMenuItemList[$i]['label'];
				}

				if (isset($aMenuItemList[$i + 1]) && $aMenuItemList[$i]['level'] < $aMenuItemList[$i + 1]['level'])
				{
					echo str_repeat(' ', $tabSpace * $intMult); ?><a href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>"><?php echo $str_item; ?></a><?php
					
					if (0 != $subSize && 0 < $aMenuItemList[$i + 1]['level'])
					{
						echo str_repeat(' ', $tabSpace * $intMult);
						$tabSpace++;
						echo str_repeat(' ', $tabSpace * $intMult);
						$tabSpace++;
					}
					echo str_repeat(' ', $tabSpace * $intMult); ?><ul><?php
					$tabSpace++;
				}
				else
				{
					echo str_repeat(' ', $tabSpace * $intMult); ?><a href="<?php echo $aMenuItemList[$i]['link']; ?>" id="<?php echo $aMenuItemList[$i]['id']; ?>" title="<?php echo $aMenuItemList[$i]['hint']; ?>"><?php echo $str_item; ?></a><?php
				}
				
				if ((isset($aMenuItemList[$i + 1]) && $aMenuItemList[$i]['level'] == $aMenuItemList[$i + 1]['level']) || 
					(isset($aMenuItemList[$i + 1]) && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level']) ||
					(!isset($aMenuItemList[$i + 1]) && $aMenuItemList[$i]['level'] > 0) ||
					(!isset($aMenuItemList[$i + 1]) && $aMenuItemList[$i]['level'] == 0))
				{
					$tabSpace--;
					echo str_repeat(' ', $tabSpace * $intMult); ?></li><?php
					
					if (0 != $subSize && 0 < $aMenuItemList[$i]['level'])
					{
						if (!isset($subCount[ $aMenuItemList[$i]['level'] ]))
						{
							$subCount[ $aMenuItemList[$i]['level'] ] = 0;
						}
						$subCount[ $aMenuItemList[$i]['level'] ]++;
					}
					if (isset($aMenuItemList[$i + 1]) && $aMenuItemList[$i]['level'] > $aMenuItemList[$i + 1]['level'])
					{
						for ($j = 0; $j < $aMenuItemList[$i]['level'] - $aMenuItemList[$i + 1]['level']; $j++)
						{
							unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
							$tabSpace--;
							echo str_repeat(' ', $tabSpace * $intMult); ?></ul><?php
							
							if (0 != $subSize && 0 < $aMenuItemList[$i]['level'])
							{
								$tabSpace--;
								echo str_repeat(' ', $tabSpace * $intMult);
								$tabSpace--;
								echo str_repeat(' ', $tabSpace * $intMult);
							}
							$tabSpace--;
							
							echo str_repeat(' ', $tabSpace * $intMult); ?></li><?php
							
						}
					}
					elseif (!$aMenuItemList[$i + 1] && $aMenuItemList[$i]['level'] > 0)
					{
						for ($j = 0; $j < $aMenuItemList[$i]['level']; $j++)
						{
							unset($subCount[ $aMenuItemList[$i]['level'] - $j]);
							$tabSpace--;
							echo str_repeat(' ', $tabSpace * $intMult); ?></ul><?php
							
							if (0 != $subSize && 0 < $aMenuItemList[$i]['level'])
							{
								$tabSpace--;
								echo str_repeat(' ', $tabSpace * $intMult);
								$tabSpace--;
								echo str_repeat(' ', $tabSpace * $intMult);
							}
							$tabSpace--;
							echo str_repeat(' ', $tabSpace * $intMult); ?></li><?php
						}
					}
					if ($subSize == $subCount[ $aMenuItemList[$i]['level'] ])
					{
						$subCount[ $aMenuItemList[$i]['level'] ] = 0;
						echo str_repeat(' ', $tabSpace * $intMult);
					}
				}
			}
		?>
		</ul>
		<?php
		}
	?>
    </body>
</html>
