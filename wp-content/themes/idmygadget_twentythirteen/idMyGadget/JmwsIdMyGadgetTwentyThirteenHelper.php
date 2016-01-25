<?php
/**
 * Helper functions added to the default WordPress theme twentythirteen.
 * This code has been added specifically to support device detction.
 *
 * @author Tom W. Hartung, using the default WordPress theme twentyfifteen as a starting point
 * @package Jmws
 * @subpackage idmygadget_twentythirteen
 * @since idmygadget_twentythirteen 1.0
 */

class JmwsIdMyGadgetTwentyThirteenHelper
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
	}
	/**
	 * Set variables so the header knows what type of navigation to use, if any
	 */
	public function setPhoneHeaderFooterNavVariables()
	{
		global $idmg_nav_in_page_or_sidebar_index;
		global $jmwsIdMyGadget;
	
		if( isset($jmwsIdMyGadget) )
		{
			$jmwsIdMyGadget->phoneHeaderNavInTwentyThirteenPage = FALSE;
			$jmwsIdMyGadget->phoneFooterNavInTwentyThirteenPage = FALSE;
			if( $jmwsIdMyGadget->phoneHeaderNavThisDevice || $jmwsIdMyGadget->phoneFooterNavThisDevice )
			{
				if ( $jmwsIdMyGadget->isPhone() )
				{
					$idmg_nav_in_page_or_sidebar_index = get_theme_mod( 'idmg_nav_in_page_or_sidebar_phones' );
				}
				else if ( $jmwsIdMyGadget->isTablet() )
				{
					$idmg_nav_in_page_or_sidebar_index = get_theme_mod( 'idmg_nav_in_page_or_sidebar_tablets' );
				}
				else
				{
					$idmg_nav_in_page_or_sidebar_index = get_theme_mod( 'idmg_nav_in_page_or_sidebar_desktops' );
				}
				if( $jmwsIdMyGadget->phoneHeaderNavThisDevice && has_nav_menu('phone-header-nav') )
				{
					$jmwsIdMyGadget->phoneHeaderNavInTwentyThirteenPage = TRUE;
				}
				if( $jmwsIdMyGadget->phoneFooterNavThisDevice && has_nav_menu('phone-footer-nav') )
				{
					$jmwsIdMyGadget->phoneFooterNavInTwentyThirteenPage = TRUE;
				}
			}
		}
	}
}
