<?
/*
  
  PHP4Delphi Additional Library
  
  2017 ver 4
  
  Classes:
  
				TAlign, TBevel, TBrush, TCanvas, TCheckListBox,
				TColorBox, TColorListBox, TControlBar, TCoolTrayIcon,
				TDateTimePicker, TDrawGrid, THotKey, TIcon, TImage,
				TLabeledEdit, TListItem, TListItems, TListView,
				TMImage, TMaskEdit, TPadding, TPageControl, TPen,
				TPicture, TScrollBox, TShape, TSplitter, TStaticText,
				TStatusBar, TTabControl, TTabSet, TTabSheet,
				TTrackBar,TTreeNodes, TTreeNode, TTreeView,
				TSizeConstraints, __TNoVisual, TStyleTabs, TStylePages
  
*/

global $_c;
$_c->lsNone = 0;
$_c->lsDefault = 1;
$_c->lsLine = 2;
$_c->lsCenter = 3;
$_c->lsArrow = 4;
$_c->lsArrowOut = 4;
$_c->stBoth = 0;
$_c->stData = 1;
$_c->stNone = 2;
$_c->stText = 3;
//Popup Align
$_c->paCenter = 0;
$_c->paLeft = 1;
$_c->paRight = 2;
$_c->maAutomatic = 0;
$_c->maManual = 1;
//Popup Animation
$_c->maLeftToRight = 0;
$_c->maRightToLeft = 1;
$_c->maTopToBottom = 2;
$_c->maBottomToTop = 3;
$_c->maNone = 4;
//Popup TrackButton
$_c->tbLeftButton = 0;
$_c->tbRightButton = 1;
$_c->msControlSelect = 0;
$_c->msShiftSelect = 1;
$_c->msVisibleOnly = 2;
$_c->msSiblingOnly = 3;
$_c->setConstList(['sbsNone', 'sbsSingle', 'sbsSunken'],'TStaticBorderStyle');
$_c->setConstList(['iaLeft', 'iaTop'],'TIconArrangement');
$_c->setConstList(['gdNone','gdVertical','gdHorizontal','gdBoth'],'TGradientDirection');
$_c->setConstList(['fsBold', 'fsItalic', 'fsUnderline', 'fsStrikeOut'],'TFontStyle');
$_c->setConstList(['bsLowered','bsRaised'],'TBevelStyle');
$_c->setConstList(['tsNone', 'tsAuto', 'tsManual'],'TTickStyle');
$_c->setConstList(['rsNone', 'rsLine', 'rsUpdate', 'rsPattern'],'TResizeStyle');
$_c->setConstList( ['dmActiveForm', 'dmDesktop', 'dmMainForm', 'dmPrimary'],'TDefaultMonitor');
$_c->setConstList( ['poNone', 'poPrintToFit', 'poProportional' ]);
$_c->setConstList(['alNone', 'alTop', 'alBottom', 'alLeft', 'alRight', 'alClient', 'alCustom'],'TAlign');
$_c->setConstList(['tsTabs', 'tsButtons', 'tsFlatButtons', 'tsNone', 'tsAuto', 'tsManual']);
$_c->setConstList(['tpTop', 'tpBottom', 'tpLeft', 'tpRight'],'TTabPosition');
$_c->setConstList(['ptBottom', 'ptLeft', 'ptNone', 'ptRight', 'ptTop']);
$_c->setConstList(['bkCustom', 'bkOK', 'bkCancel', 'bkHelp', 'bkYes', 'bkNo', 'bkClose', 'bkAbort', 'bkRetry', 'bkIgnore', 'bkAll']);
$_c->setConstList(['ssRegular', 'ssHotTrack', 'ssFlat']);
$_c->setConstList(['lbStandard', 'lbOwnerDrawFixed', 'lbOwnerDrawVariable',
    'lbVirtual', 'lbVirtualOwnerDraw']);
$_c->setConstList(['cbUnchecked', 'cbChecked', 'cbGrayed']);

$_c->setConstList(['trHorizontal', 'trVertical']);
$_c->setConstList(['tmBottomRight', 'tmTopLeft', 'tmBoth']);

$_c->setConstList(['sbHorizontal', 'sbVertical']);
$_c->setConstList(['scLineUp', 'scLineDown', 'scPageUp', 'scPageDown', 'scPosition',
    'scTrack', 'scTop', 'scBottom', 'scEndScroll']);

$_c->setConstList(['dfShort','dfLong']);
$_c->setConstList(['dmComboBox','dmUpDown']);
$_c->setConstList(['dtkDate','dtkTime']);

$_c->setConstList(['bsBox', 'bsFrame', 'bsTopLine', 'bsBottomLine', 'bsLeftLine',
                                'bsRightLine', 'bsSpacer']);
$_c->setConstList(['fpDefault','fpVariable', 'fpFixed']);
$_c->setConstList(['fqDefault', 'fqDraft', 'fqProof', 'fqNonAntialiased', 'fqAntialiased', 'fqClearType', 'fqClearTypeNatural']);
function _addfont(&$arr){
	$arr[] = [
                  'CAPTION'=>t('font'),
                  'TYPE'=>'font',
                  'PROP'=>'font',
                  'CLASS'=>'TFont',
                  ];
	$arr[] = ['CAPTION'=>t('Font Color'), 'PROP'=>'font->color'];
	$arr[] = ['CAPTION'=>t('Font Size'), 'PROP'=>'font->size'];
	$arr[] = ['CAPTION'=>t('Font Height'), 'PROP'=>'font->height'];
	$arr[] = ['CAPTION'=>t('Font Pitch'), 'PROP'=>'font->pitch'];
	$arr[] = ['CAPTION'=>t('Font Quality'), 'PROP'=>'font->quality'];
	$arr[] = ['CAPTION'=>t('Font Orientation'), 'PROP'=>'font->orientation'];
	$arr[] = ['CAPTION'=>t('Font Style'), 'PROP'=>'font->style'];
}
class TCoolTrayIcon extends TControl {
	
	protected $_picture;
	protected $_icon;
	
	public function get_picture(){
		
		if (!isset($this->_picture))
			$this->_picture = new TIcon();
		$this->_picture->self = gui_propget($this->self,'Icon');
		return $this->_picture;
	}
	
	public function get_icon(){
		return $this->get_picture();
	}
	
	public function loadPicture($file){
		
		$this->picture->loadAnyFile($file);
	}
	
	public function loadFromBitmap($bt){
		
		$this->picture->assign($bt);
	}
	
	public function set_iconFile($v){
		
		$this->aiconFile = $v;
		$v = getFileName($v);
		if (!file_exists($v)) return;
		
		$this->loadPicture($v);
	}
	
	public function get_iconFile(){
		return $this->aiconFile;
	}
	
	public function get_hint(){
		return $this->get_prop('hint');
	}
	
	public function set_hint($v){
		$this->set_prop('hint',$v);
	}
	
	public function assign(TCoolTrayIcon $icon){
		tpersistent_assign($this->self, $icon->self);
	}
	
	public function showBalloonTip(){
		
		return trayicon_balloontip($this->self, $this->title, $this->text, $this->flag, $this->timeout);
	}
	
	public function hideBalloonTip(){
		return trayicon_hideballoontip($this->self);
	}
}

class TTrackBar extends TControl {}


class THotKey extends TControl {
	
	
	public function set_hotKey($sc){
		
		if (!is_numeric($sc))
			$sc = text_to_shortcut(strtoupper($sc));
		$this->set_prop('hotKey',$sc);
	}
	
	public function get_hotKey(){
		
		$result = $this->get_prop('hotKey');
		return shortCut_to_text($result);
	}
}

class TMaskEdit extends TControl {}


class TImage extends TControl {
	
	protected $_picture;
	public function get_Canvas()
	{
		return _c(gui_propget($this->self,'Canvas'));
	}
	
	public function loadPicture($file){
		
		$this->picture->loadAnyFile($file);
	}
	
	public function loadFromFile($file){
		$this->loadPicture($file);
	}
	
	public function loadFromBitmap($bt){
		
		$this->picture->assign($bt);
	}
	
	public function loadFromUrl($url, $ext = false){
		$this->picture->loadFromUrl($url, $ext = false);
	}
	
	public function saveToFile($file){
		$file = replaceSl($file);
		$this->picture->saveToFile($file);
	}
}

class TMImage extends TImage {}

class TDrawGrid extends TControl {}

class TShape extends TControl {
	
	
	protected $_brush;
	protected $_pen;
	
	public function get_brush(){
		
		if (!$this->_brush)
			$this->_brush = new TBrush();
		$this->_brush->self = gui_propGet($this->self,'Brush');
		return $this->_brush;
	}
	
	public function get_pen(){
		
		if (!isset($this->_pen))
			$this->_pen   = new TPen();
		
		$this->_pen->self   = gui_propGet($this->self,'Pen');
		
		return $this->_pen;
	}
	
	function get_brushColor(){ return $this->brush->color; }
	function set_brushColor($v){ $this->brush->color = $v; }
	function get_brushStyle(){ return $this->brush->style; }
	function set_brushStyle($v){ $this->brush->style = $v; }
	
	function get_penColor(){ return $this->pen->color; }
	function set_penColor($v){ $this->pen->color = $v; }
	function get_penMode(){ return $this->pen->mode; }
	function set_penMode($v){ $this->pen->mode = $v; }
	function get_penStyle(){ return $this->pen->style; }
	function set_penStyle($v){ $this->pen->style = $v; }
	function get_penWidth(){ return $this->pen->width; }
	function set_penWidth($v){ $this->pen->width = $v; }
}

class TScrollBox extends TControl {
	
	protected $_constraints;	
	
	function get_constraints(){
		if (!isset($this->_constraints)){
			$this->_constraints = new TSizeConstraints(nil,gui_propGet($this->self,'constraints'));
		}
		return $this->_constraints;
	}
	
	public function isVScrollShowing(){
		
		return scrollbox_vsshowing($this->self);
	}
	
	public function isHScrollShowing(){
		
		return scrollbox_hsshowing($this->self);
	}
	
	public function get_scrollBarSize(){
		return scrollbox_sbsize($this->self);
	}
}

class TCheckListBox extends TControl {
	
	protected $_items;
	
	function get_items(){
		if (!isset($this->_items)){
			$this->_items = new TStrings(nil,gui_propGet($this->self,'Items'));
			$this->_items->parent_object = $this->self;
		}
		return $this->_items;
	}
	
	function isChecked($index){
		
		return checklist_checked($this->self, $index);
	}
	
	function setChecked($index, $value = true){
		checklist_setchecked($this->self, $index, $value);
	}
	
	function get_checkedItems(){
		$result = [];
		$list = $this->items->lines;
		if (count($list))
		foreach ($list as $index=>$v){
			if ($this->isChecked($index))
				$result[$index] = $v;
		}
		
		return $result;
	}
	
	function set_checkedItems($v){
		
		$list = $this->items->lines;
		
		if (count($list))
		foreach ($list as $index=>$x){
			
			$this->setChecked($index, in_array($x, $v));
		}
	}
	
	function unCheckedAll(){
		$this->checkedItems = [];
	}
	
	function checkedAll(){
		$list = $this->items->lines;
		$this->checkedItems = $list;
	}
	
	function get_itemIndex(){
		return $this->items->itemIndex;
	}
	
	function set_itemIndex($v){
		$this->items->itemIndex = $v;
	}
	
	function set_inText($v){
		$this->items->setLine($this->itemIndex, $v);
	}
	
	function get_inText(){
		return $this->items->getLine($this->itemIndex);
	}
	
	function set_text($v){
		$this->items->text = $v;
	}
	
	function clear(){
		
		$this->text = '';
	}
	
	function get_text(){
		return $this->items->text;
	}
}

class TSplitter extends TControl {function get_enabled(){return true;}}

class TStatusBar extends TControl {
	
	
	function __construct($owner=nil,$self=nil){
		parent::__construct($owner,$self);
		
		if ($self==nil){
			$this->useSystemFont = false;
			$this->simplePanel   = true;
		}
	}
}


class TTabControl extends TControl {
	
	protected $_tabs;
	
	function get_tabs(){
		if (!isset($this->_tabs)){
			$this->_tabs = new TStrings(nil,gui_propGet($this->self,'tabs'));
			$this->_tabs->parent_object = $this->self;
		}
		return $this->_tabs;
	}
	
	function addPage($caption)
	{
		$this->tabs->add($caption);
		return $this->tabs->get_count();
	}
	
	function delPage($v){
		if( is_int($v) ){
			$this->tabs->delete($v);
			return true;
		} elseif( is_string($v) ){
			$this->tabs->delete( array_flip($this->tabs->strings)[$v] );
			return true;
		}
		return false;
	}
	
	
	function indexOfTabXY($x, $y)
	{
		return $this->IndexOfTabAt($x, $y);
	}
	
	function TabfromXY($x, $y)
	{
		return $this->tabs->getLine( $this->IndexOfTabAt($x, $y) );
	}
	
	function set_text($v){
		$this->tabs->text = $v;
	}
	
	function get_text(){
		return $this->tabs->text;
	}
	
}

class TPageControl extends TControl {
	
	public $pages;
	
	function __loadDesign(){
		
		$this->__initComponentInfo();
	}
	
	function __initComponentInfo(){
		$index = (int)$this->apageIndex;
		if ($index == 0){
			if ($this->pageCount == 1){
				$this->addPage('-');
				$this->pageIndex = 1;
				$this->pageIndex = $index;
				$this->delete(1);
			} else {
				$this->pageIndex = 1;
				$this->pageIndex = $index;
			}
		} else {
			$this->pageIndex = $index;
		}
	}
	
	function set_ActivePage($page){
		
		pagecontrol_activepage($this->self, $page->self);
		$this->apageIndex = $this->pageIndex;
	}
	
	function get_ActivePage(){
		
		return _c(pagecontrol_activepage($this->self, null));
	}
	
	function addPage($caption){
		
		$p = new TTabSheet(_c($this->owner));
		$p->parent = $this;
		$p->parentControl = $this;
		$p->caption = $caption;
		$p->doubleBuffer = true;
		$p->aenabled = true;
		$p->avisible = true;
		
		return $p;
	}
	
	function get_pageCount(){
		
		return pagecontrol_pagecount($this->self);
	}
	
	function pages(){
		
		$c = $this->pageCount;
		
		for ($i=0; $i<$c; $i++){
			
			$result[] = _c(pagecontrol_pages($this->self,$i));
		}
		
		return $result;
	}
	
	function set_pageIndex($v){
		$pages = $this->pages();
		
		if ($pages[$v]){
			//c('fmMain')->caption = ($pages[$v]->caption);
			$this->ActivePage = $pages[$v];
			$pages[$v]->visible = true;
		}
	}
	
	function get_pageIndex(){
		
		$a_page = $this->ActivePage;
		$pages  = $this->pages();
		
		for ($i=0; $i<count($pages); $i++){
			if ($pages[$i]->self == $a_page->self)
				return $i;
		}
		return -1;
	}
	
	function set_pagesList($arr){
		
		if (!is_array($arr))
			$arr = explode(_BR_, $arr);
		
		foreach ($arr as $i=>$el){
			if ($el)
			$tmp[] = trim($el);
		}
		
		unset($arr);
		$arr =& $tmp;
		
		$pages = $this->pages();
		for ($i=0; $i<count($pages); $i++){
			
			if (count($arr)-1<$i){
				$pages[$i]->free();
			} else {
				$pages[$i]->caption = $arr[$i];
			}
		}
		
		for ($i=count($pages)-1; $i<count($arr)-1; $i++)
			$this->addPage($arr[$i+1]);
		
	}
	
	function get_pagesList(){
		
		$pages = $this->pages();
		$result = [];
		
		
		for($i=0; $i<count($pages); $i++){
			$result[] = $pages[$i]->caption;
		}
		
		return implode(_BR_, $result);
	}
	
	function clear(){
		$pages = $this->pages();
		for ($i=0; $i<count($pages); $i++)
			$pages[$i]->free();
	}
	
	function delete($index){
		$pages = $this->pages();
		
		if ($pages[$index])
			$pages[$index]->free();
	}
	private function forset($vname, $v){
		if($this->pages())
		foreach( $this->pages() as $page){
			gui_propset($page->self, $vname, $v);
		}
		gui_propset($this->self, $vname, $v);
	}
	function set_hotTrack($v){
		$this->forset('HotTrack',$v);
	}
	
	function set_MultiLine($v){
		$this->forset('MultiLine',$v);
	}
	
	function set_OwnerDraw($v){
		$this->forset('OwnerDraw',$v);
	}
	
	function set_RaggedRight($v){
		$this->forset('RaggedRight',$v);
	}
	
	function set_ScrollOpposite($v){
		$this->forset('ScrollOpposite',$v);
	}
}

class TTabSheet extends TControl {
	
	
	function set_parentControl($obj){
		tabsheet_parent($this->self, $obj->self);
	}
	
	function get_parentControl(){
		return _c(tabsheet_parent($this->self,0));
	}
	
	function free(){
		
		foreach ($this->componentList as $el)
			$el->free();
			
		parent::free();
	}
}


class TSizeConstraints extends TComponent {}
#maxWidth
#maxHeight
#minWidth
#minHeight
	
class TPadding extends TControl {}

class TListItems extends TControl implements ArrayAccess, Iterator, Countable
{
	private $__p = 0;
	
	public function rewind()
	{
        $this->__p = 0;
    }

    public function current()
	{
        return $this->GetItem($this->__p);
    }

    public function key()
	{
        return $this->__p;
    }

    public function next()
	{
        ++$this->__p;
    }

    public function valid()
	{
        return $this->__p < $this->count;
    }
	
	public function offsetSet($offset, $value)
	{
		if(!is_numeric($offset)) return;
		if( !is_object($value) )	{ $_v = new TListItem(); $_v->Caption = (string)$value; $value = $_v; }
		if( $offset >= $this->count )
		{
			$this->AddItem($value, $offset);
		} else {
		
			$sib = $this->GetItem($offset);
			$this->SetItem($offset, $value);
		   if(gui_isset($sib->self))
			$sib->Free();
		}
    }

    public function offsetExists($offset)
	{
        return $offset < $this->count;
    }

    public function offsetUnset($offset)
	{
		if(is_numeric($offset)&&$offset<$this->count)
        $this->GetItem($offset)->free();
    }

    public function offsetGet($offset)
	{
        return (is_numeric($offset)&&($offset < $this->count))? $this->GetItem($offset): null;
    }
	
	function delete($index){ listitems_command($this->self, __FUNCTION__, $index,0); }
	function add(){ return _c(listitems_command($this->self, __FUNCTION__,0,0)); }
	function clear(){ listitems_command($this->self, __FUNCTION__,0,0); }
	function addItem($item, $index) { return _c(listitems_command($this->self, __FUNCTION__, $item->self, $index)); }
	function indexOf($item) { return listitems_command($this->self, __FUNCTION__, $item->self, 0); }
	function insert($index) { return _c(listitems_command($this->self, __FUNCTION__, $index, 0)); }
	
	function count(){ return listitems_command($this->self, __FUNCTION__, 0, 0); }
	function get($index){ return _c(listitems_command($this->self, __FUNCTION__, $index, 0)); }
	
	function get_selected(){
		
		$result = [];
		
		foreach (explode(',',listitems_command($this->self, 'selected', 0,0)) as $el) if ($el!=='')
			$result[] = $el;
		
		return $result;
	}
	
	function set_selected($var){
			
		foreach ($var as $k=>$v)
			listitems_selected($this->self, $k, $v);
	}
	
	function select($index){
		listitems_selected($this->self, $index, true);
	}
	
	function unSelect($index){
		listitems_selected($this->self, $index, false);
	}
	
	function unSelectAll(){
		$c = $this->count();
		for($i=0; $i<$c-1; $i++)
			$this->unSelect($i);
	}
	
	function selectAll(){
		$c = $this->count();
		for($i=0; $i<$c-1; $i++)
			$this->select($i);
	}
	
	function indexByCaption($caption){
		
		$c       = $this->count();
		$caption = strtolower($caption);
		
		for ($i=0; $i<$c; $i++){
			
			$item = $this->get($i);
			if (strtolower($item->caption)==$caption)
				return $i;
		}
		
		return -1;
	}
	
	function selectByCaption($caption){
		
		if (is_array($caption)){
			$this->unSelectAll();
			if (count($caption)){
			foreach ($caption as $el){
				$index = $this->indexByCaption($el);
				if ($index > -1)
					$this->select($index);
			}
			}
		} else {
			$index = $this->indexByCaption($caption);
			$this->unSelectAll();
			if ($index > -1)
				$this->select($index);
		}
	}
	
	function get_selectedCaption(){

		$result = [];
		foreach ($this->selected as $id){
			
			$result[] = $this->get($id)->caption;
		}
		return $result;
	}
	
	function set_selectedCaption($caption){
		$this->selectByCaption($caption);
	}
}

class TListItem extends TControl {
	
	
	function delete(){ listitem_command($this->self, __FUNCTION__); }
	function update(){ listitem_command($this->self, __FUNCTION__); }
	function canceledit(){ listitem_command($this->self, __FUNCTION__); }
	function editcaption(){ return listitem_command($this->self, __FUNCTION__); }
	
	function get_index(){ return listitem_prop($this->self, __FUNCTION__, null);}
	function get_selected() { return listitem_prop($this->self, __FUNCTION__, null);}
	
	function get_imageindex() {return listitem_prop($this->self, __FUNCTION__, null);}
	function get_stateindex() {return listitem_prop($this->self, __FUNCTION__, null);}
	function get_indent() {return listitem_prop($this->self, __FUNCTION__, null);}
	function get_caption() {return listitem_prop($this->self, __FUNCTION__, null);}
	function get_checked() {return listitem_prop($this->self, __FUNCTION__, null);}
	
	function set_imageindex($v) {listitem_prop($this->self, __FUNCTION__, $v);}
	function set_stateindex($v) {listitem_prop($this->self, __FUNCTION__, $v);}
	function set_indent($v) {listitem_prop($this->self, __FUNCTION__, $v);}
	function set_caption($v) {listitem_prop($this->self, __FUNCTION__, $v);}
	function set_checked($v) {listitem_prop($this->self, __FUNCTION__, $v);}
	
	function set_subItems($arr){
		
		if (is_array($arr))
			$arr = implode(_BR_, $arr);
		
		listitem_prop($this->self, __FUNCTION__, $arr);
	}
	
	function get_subItems(){
		$str = listitem_prop($this->self, __FUNCTION__, null);
		return explode(_BR_, $str);
	}
}

class TListView extends TControl {
	
	
	protected $_items;
	
	function get_items(){
		
		if (!$this->_items){
			$this->_items = new TListItems($this,gui_propGet($this->self,'items'));
		}
		return $this->_items;
	}
	
	function set_images($c){
		imagelist_set_images($this->self, $c->self);
	}
	
	function get_selected(){
		return $this->items->get_selected();
	}
	function get_iar(){
		return gui_propget($this->IconOptions, 'Arrangement');
	}
	function set_iar($v){
		gui_propset($this->IconOptions, 'Arrangement', $v);
	}
	
	function set_autoar($v){
		gui_propset($this->IconOptions, 'AutoArrange', $v);
	}
	
	function set_textwrap($v){
		gui_propset($this->IconOptions, 'WrapText', $v);
	}
}


class TDateTimePicker extends TControl {
	
	
	
	public function get_date(){
		
		return datetime_str($this->get_prop('date'));
	}
	
	function set_date($v){ $this->set_prop('date', str_datetime($v)); }
	
	function get_maxDate(){ return datetime_str($this->get_prop('maxDate'));}
	function get_minDate(){ return datetime_str($this->get_prop('minDate'));}
	function get_time(){return wtime_str($this->get_prop('time'));}
	
	function set_maxDate($v){ $this->set_prop('maxDate', str_datetime($v)); }
	function set_minDate($v){ $this->set_prop('minDate', str_datetime($v)); }
	function set_time($v){ $this->set_prop('time', str_wtime($v)); }
	function set_MonthBackColor($v){ gui_propset($this->calColors, 'MonthBackColor', $v); }
	function set_TextColor($v){ gui_propset($this->calColors, 'TextColor', $v); }
	function set_TitleBackColor($v){ gui_propset($this->calColors, 'TitleBackColor', $v); }
	function set_TitleTextColor($v){ gui_propset($this->calColors, 'TitleTextColor', $v); }
	function set_TrailingTextColor($v){ gui_propset($this->calColors, 'TrailingTextColor', $v); }
}

class TTreeView extends TControl
{

	private function PrintArrayToString(array $Add, $i = 0)
	{
		$NewText = '';
		$ni = $i;
		foreach($Add as $KeyName => $KeyValue) {
			if(is_array($KeyValue)) {
				$NewText .= str_pad('', $ni++, ' ') . $KeyName  . PHP_EOL . $this->PrintArrayToString($KeyValue, $ni);
			} else {
				$NewText .= str_pad('', $ni, ' ')   . $KeyValue . PHP_EOL;
			}
			$ni = $i;
		}
		return $NewText;
	}  
	
	public function get_AllItemSelected()
	{
		$Result= [];
		$Base  = explode(PHP_EOL, tree_gettext($this->self));
		$Level = null;
		for($i = $this->absIndex; $i >= 0; --$i) {
			$value = $Base[$i];
			if($Level === null) {
				$Result[] = trim($value);
				$Level = strlen($value) - strlen(ltrim($value));
			} elseif(($ToLevel = strlen($value) - strlen(ltrim($value))) < $Level) {
				$Result[] = trim($value);
				$Level = $ToLevel;
			} elseif($ToLevel == 0) break;
		}
		return array_reverse($Result);
	}

	
	public function loadFromStr($str)
	{
		tree_loadstr($this->self,$str);
	}
	
	public function get_text()
	{
		return tree_gettext($this->self);
	}
	
	public function set_text($v)
	{
		if(is_array($v)) {
			tree_loadstr($this->self, $this->PrintArrayToString($v));
		} else
			$this->loadFromStr($v);
	}
	
	public function get_itemSelected()
	{
		$arr = explode(_BR_,$this->text);
		return trim($arr[ $this->absIndex ]);
	}
	
	public function set_itemSelected($v)
	{
		$this->absIndex = -1;
		$v   = strtolower($v);
		$arr = explode(_BR_,$this->text);
		foreach ($arr as $i=>$text){
			$text = strtolower(trim($text));
			if ($v==$text){
				$this->absIndex = $i;
			}
		}
	}
	
	public function get_selected()
	{
		$res = tree_selected($this->self);
		if ($res === null){
			return null;
		} else
			return _c( $res );
	}
	
	public function set_selected($v)
	{
		tree_select($this->self, $v->self);
	}
	
	public function get_absIndex()
	{
		$sel = $this->selected;
		if ($sel)
			return $sel->absIndex;
		else
			return -1;
	}
	
	public function set_absIndex($v)
	{
		return tree_setAbsIndex($this->self, (int)$v);
	}
	
	public function addItem($name, $tab)
	{
		if($tab>0)
			for($i=1;$i<=$tab;$i++){
				$tabs .= '	';
			}
		$this->text .= $tabs.$name._BR_;
	}
	
	
}

class TTreeNodes extends TControl implements ArrayAccess, Iterator, Countable
{//у меня идея лучше
	private $__p = 0;
	
	public function rewind()
	{
        $this->__p = 0;
    }

    public function current()
	{
        return $this->GetNodeFromIndex($this->__p);
    }

    public function key()
	{
        return $this->__p;
    }

    public function next()
	{
        ++$this->__p;
    }

    public function valid()
	{
        return $this->__p < $this->count;
    }
	
	public function offsetSet($offset, $value)
	{
		if(!is_numeric($offset)) return;
		if( $offset >= $this->count )
		{
			$sib = $this->GetNodeFromIndex($this->count-1);
			if( is_object($value) )
			{
				$this->InsertNode($value, $sib, $value->Text, new Pointer(nil));
			} else {
				$this->Add($sib,(string)$value);
			}
		} else {
		
			$sib = $this->GetNodeFromIndex($offset);
			is_object($value)?$this->InsertNode($sib,$value,$value->text, new Pointer(nil)):$this->Insert($sib,(string)$value);
		   if(gui_isset($sib->self))
			$sib->Free();
		}
    }

    public function offsetExists($offset)
	{
        return $offset < $this->count;
    }

    public function offsetUnset($offset)
	{
		if(is_numeric($offset)&&$offset<$this->count)
        $this->GetNodeFromIndex($offset)->free();
    }

    public function offsetGet($offset)
	{
        return (is_numeric($offset)&&($offset < $this->count))? $this->GetNodeFromIndex($offset): null;
    }
	
	public function count()
	{
		return $this->count;
	}
	
}

class TTreeNode extends TControl 
{	
	public function get_absIndex()
	{
		return tree_absIndex($this->self);
	}
	
	public function set_Expanded($v)
	{
		tree_expand($this->self, $v, false);
	}
	
	public function Expand($v=false){
		tree_expand($this->self, true, $v);
	}
	
	public function Collapse($v=false){
		tree_expand($this->self, false, $v);
	}
}

//Аналог компонента TPageControl, и TTabControl, в flat(плоском) стиле.
class TStyleTabs extends TTransparentPanel {
	public $class_name = __CLASS__;
	
	function __initComponentInfo(){
		
	}
	
    function __construct($owner=nil,$self=nil){
	parent::__construct($owner,$self);
    	
        if ($self==nil){
		//Создаёт компонент управления страницами(scrollbox'ами)
		$pages = new TStylePages;
		$pages->parent = $this;
		
		//Опридиляет его в свойство
		$this->__controlpages = $pages;
		}
	}
	
	//Возвращает страницу по индексу
	function GetPage($v){
		return $this->__controlpages->GetPage($v);
	}
	
	//Возвращает индекс активной страницы
	function get_pageIndex(){
		return $this->__controlpages->pageIndex;
	}
	
	//Устанавливает по индексу активную страницу
	function set_pageIndex($v){
		$this->__controlpages->pageIndex = $v;
		//Делает не активными все табы которые не имеют активного индекса
		$this->tabActive($v);
	}
	
	//Возвращает список страниц из контроллера страниц
	function get_pagesList(){
		return $this->__controlpages->pagesList;
	}
	
	//Устанавливает список страниц в контроллер страниц
	function set_pagesList($v){
		$this->__controlpages->pagesList = $v;
		$array = explode(PHP_EOL, $v);
		if(is_array($this->tab)){
			foreach($this->tab as $tab){
				$tab->free();
			}
			unset($this->tab);
		}
		$index = $this->__controlpages->pageIndex;
		foreach($array as $i=>$tabName){
			$spage = $this->__controlpages->GetPage($i);
			//Создаёт таб - кнопку для переключения активных страниц
			$tab = new TSB($this);
			$tab->parent = $this;
			$tab->caption = $tabName;
			$tab->index = $i;
			$tab->fMouseEnter = null;
			$tab->ParentFont = true;
			event_set($tab->self, 'onMouseEnter', 'TSB::fMouseEnter');
			event_set($tab->self, 'onMouseDown', 'TSB::fMouseDown');
			event_set($tab->self, 'onMouseUp', 'TSB::fMouseUp');
			$apage = $this; 
			$tab->onClick = function()use($apage, $i){
				$apage->pageIndex = $i;
				$apage->tabActive($i);
			};
			if($i>0){
				$this->__controlpages;
				$oldtab = c($this->__controlpages->GetPage($i-1)->__ctab);
				$tab->x = $oldtab->x + $oldtab->w;
			} else {
				$tab->x = 0;
			}
			$tab->layout = tlCenter;
			$tab->alignment = taCenter;
			$tab->y = 0;
			$tab->h = !empty((int)$this->tabHeight)?$this->tabHeight:20;
			$tab->w = $this->font->size * strlen($tabName);
			//Устанавливает self в свойство, для лёгкой работы со старыми табами
			$spage->__ctab = $tab->self;
			$tabs[$i] = $tab;
		}
		$this->tab = $tabs;//Загружает все новые табы в свойство
		$this->tabActive($index);
	}
	
	//Устанавливает активную страницу по имени его таба
	function set_ActivePage($v){
		$arr = array_flip(explode(PHP_EOL, $this->pagesList));
		$this->pageIndex = $arr[$v];
	}
	
	//Возвращает имя таба активной страницы
	function get_ActivePage(){
		$arr = explode(PHP_EOL, $this->pagesList);
		return $arr[$this->pageIndex];
	}
	
	//Выделяет(Меняет цвет) таб(а) по индексу
	function tabActive($v){
		if(is_array($this->tab)){
			foreach($this->tab as $tab){
				$tab->ColorTwo = $tab->ColorOne = $this->ColorInactive;//Устанавливает цвет неактивного таба
				$tab->OneFColor = $this->FColorInactive;//Устанавливает цвет шрифта неактивного таба
			}
			$this->tab[$v]->ColorOne = $this->tab[$v]->ColorTwo = $this->tab[$v]->ColorThree = $this->ColorActive;//Устанавливает цвет активного таба
			$this->tab[$v]->OneFColor = $this->tab[$v]->TwoFColor = $this->tab[$v]->ThreeFColor = $this->FColorActive;//Устанавливает цвет шрифта активного таба
		}
	}
	
}

//Компонент управления страницами(scrollbox'ами)
class TStylePages extends TControl
{
	
	//Возвращает объект/страницу(scrollbox) но индексу
	function GetPage($index){
		return _c($this->pages[$index]);
	}
	
	//Добавляет страницу(scrollbox) с указаным именем таба
	function AddPage($name){
		$parent = $this->parent;
		$page = new TScrollBox($parent);
		$page->parent = $parent;
		$page->color = $parent->tabColor;
		$page->x = 0;
		$page->y = !empty((int)$parent->tabHeight)?$parent->tabHeight:20;
		$page->w = $parent->w;
		$page->h = $parent->h - $page->y;
		$page->pageName = $name;
		$page->bevelInner = bvNone;
		$page->bevelOuter = bvNone;
		$page->bavelKind = bkNone;
		$page->borderStyle = bsNone;
		$page->ParentBackground = false;
		$page->index = $this->count;
		$pages = $this->pages;
		$pages[] = $page->self;
		$this->pages = $pages;
	}
	
	//Удаляет страницу(scrollbox) по индексу
	function RemovePage($index){
		$this->GetPage($index)->free();
		unset($this->pages[$index]);
	}
	
	//Возвращает индекс активной страницы
	function get_pageIndex(){
		if($this->count>0)
			return $this->__pageIndex;
		return false;
	}
	
	//Устанавливает страницу в активное положение
	function set_pageIndex($index){
		if(is_array($this->pages)){
			foreach($this->pages as $page){
				c($page)->visible = false;
			}
			$page = $this->GetPage($index);
			$page->visible = true;
			$this->parent->doubleBuffered = true;
		}
		$this->__pageIndex = $index;
	}
	
	//Возвращает текущий список
	function get_pagesList(){
		$count = $this->count;
		for($i=0;$i<$count;$i++){
			$text .= $this->GetPage($i)->pageName . _BR_;
		}
		return $text;
	}
	
	//Удаляет старый список с scrollbox'ами и заменяет его новым из текста
	function set_pagesList($text){
		$arr = explode(PHP_EOL, $text);
		if(is_array($this->pages)){
			foreach($this->pages as $self){
				c($self)->free();
			}
			$this->pages = [];
		}
		foreach($arr as $name){
			if($name!==null)
				$this->AddPage($name);
		}
	}
	
	//Выводит число всех scrollbox'ов
	function get_count(){
		return count($this->pages);
	}
}

?>