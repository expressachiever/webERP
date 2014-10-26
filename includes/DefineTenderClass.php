<?php
/* $Id: DefineTenderClass.php 4821 2012-01-20 13:48:53Z tim_schofield $ */
/* Definition of the tender class to hold all the information for a supplier tender
*/

Class Tender {

	var $TenderId;
	var $LineItems; /*array of objects of class LineDetails using the product id as the pointer */
	var $CurrCode;
	var $ExRate;
	var $Initiator;
	var $RequiredByDate;
	var $RequisitionNo;
	var $DelAdd1;
	var $DelAdd2;
	var $DelAdd3;
	var $DelAdd4;
	var $DelAdd5;
	var $DelAdd6;
	var $Telephone;
	var $Comments;
	var $Location;
	var $OrderNo; /*Only used for modification of existing orders otherwise only established when order committed */
	var $LinesOnTender;
	var $SuppliersOnTender;
	var $GLLink; /*Is the GL link to stock activated only checked when order initiated or reading in for modification */
	var $Version;
	var $Revised;
	var $contact;
	var $Suppliers;

	function tender(){
	/*Constructor function initialises a new purchase tender object */
		$this->LineItems = array();
		$this->Suppliers = array();
		$this->LinesOnTender=0;
		$this->SuppliersOnTender=0;
	}

	function EmailSuppliers() {
		$EmailText= _('This email has been automatically generated by webERP') . "\n";
		$EmailText.= _('You are invited to Tender for the following products to be delivered to') . ' ' . $_SESSION['CompanyRecord']['coyname'] . "\n";
		$EmailText.= _('Tender number') . ': ' . $this->TenderId  . "\n";
		$EmailText.= _(' Quantity ').' '._(' Unit ').' '._(' Item Description')."\n";
		foreach ($this->LineItems as $LineItem) {
			$EmailText.= $LineItem->Quantity.' '.$LineItem->Units.' '.$LineItem->ItemDescription . "\n";
		}
		$Subject=(_('Tender received from').' '.$_SESSION['CompanyRecord']['coyname'] );
		$Headers = 'From: '. $_SESSION['PurchasingManagerEmail']. "\r\n" . 'Reply-To: ' . $_SESSION['PurchasingManagerEmail'] . "\r\n" . 'X-Mailer: PHP/' . phpversion();
		if($_SESSION['SmtpSetting']==1){
			include('includes/htmlMimeMail.php');
			$mail = new htmlMimeMail();
			$mail->setText($EmailText);
			$mail->setSubject($Subject);
			$mail->setFrom($_SESSION['PurchasingManagerEmail']);
			$mail->setHeader('Reply-To',$_SESSION['PurchasingManagerEmail']);
			$mail->setCc($_SESSION['PurchasingManagerEmail']); //Set this as a copy for filing purpose

		}
		foreach ($this->Suppliers as $Supplier) {
		 if($_SESSION['SmtpSetting']==0){
			 $result = mail($Supplier->EmailAddress, $Subject, $EmailText, $Headers);
		 }else{
			 $result = SendmailBySmtp($mail,array($Supplier->EmailAddress,$_SESSION['PurchasingManagerEmail']));	
		 }
		}
	}

	function save($db) {
		/* Does record exist for this tender
		 */
		if ($this->TenderId=='') {
			$this->TenderId = GetNextTransNo(37, $db);
			$HeaderSQL="INSERT INTO tenders (tenderid,
											location,
											address1,
											address2,
											address3,
											address4,
											address5,
											address6,
											telephone,
											requiredbydate)
								VALUES ('" . $this->TenderId  . "',
										'" . $this->Location  . "',
										'" . $this->DelAdd1  . "',
										'" . $this->DelAdd2  . "',
										'" . $this->DelAdd3  . "',
										'" . $this->DelAdd4  . "',
										'" . $this->DelAdd5  . "',
										'" . $this->DelAdd6  . "',
										'" . $this->Telephone  . "',
										'" . FormatDateForSQL($this->RequiredByDate) . "')";
			foreach ($this->Suppliers as $Supplier) {
				$SuppliersSQL[]="INSERT INTO tendersuppliers (tenderid,
															supplierid,
															email)
								VALUES ('" . $this->TenderId . "',
										'" . $Supplier->SupplierCode . "',
										'" . $Supplier->EmailAddress . "')";
			}
			foreach ($this->LineItems as $LineItem) {
				$ItemsSQL[]="INSERT INTO tenderitems (tenderid,
														stockid,
														quantity,
														units)
											VALUES ('" . $this->TenderId . "',
													'" . $LineItem->StockID . "',
													'" . $LineItem->Quantity . "',
													'" . $LineItem->Units . "')";
			}
		} else {
			$HeaderSQL="UPDATE tenders SET location='" . $this->Location  . "',
											address1='" . $this->DelAdd1  . "',
											address2='" . $this->DelAdd2  . "',
											address3='" . $this->DelAdd3  . "',
											address4='" . $this->DelAdd4  . "',
											address5='" . $this->DelAdd5  . "',
											address6='" . $this->DelAdd6  . "',
											telephone='" . $this->Telephone  . "',
											requiredbydate='" . FormatDateForSQL($this->RequiredByDate)  . "'
						WHERE tenderid = '" . $this->TenderId  . "'";
			foreach ($this->Suppliers as $Supplier) {
				$sql="DELETE FROM tendersuppliers
					WHERE  tenderid='" . $this->TenderId . "'";
				$result=DB_query($sql);
				$SuppliersSQL[]="INSERT INTO tendersuppliers (
									tenderid,
									supplierid,
									email)
								VALUES ('" . $this->TenderId . "',
										'" . $Supplier->SupplierCode . "',
										'" . $Supplier->EmailAddress . "')";
			}
			foreach ($this->LineItems as $LineItem) {
				$sql="DELETE FROM tenderitems
						WHERE  tenderid='" . $this->TenderId . "'";
				$result=DB_query($sql);
				$ItemsSQL[]="INSERT INTO tenderitems (tenderid,
														stockid,
														quantity,
														units)
								VALUES ('" . $this->TenderId . "',
										'" . $LineItem->StockID . "',
										'" . $LineItem->Quantity . "',
										'" . $LineItem->Units . "')";
			}
		}
		DB_Txn_Begin($db);
		$result=DB_query($HeaderSQL, '', '', True);
		foreach ($SuppliersSQL as $sql) {
			$result=DB_query($sql, '', '', True);
		}
		foreach ($ItemsSQL as $sql) {
			$result=DB_query($sql, '', '', True);
		}
		DB_Txn_Commit($db);
	}

	function add_item_to_tender(	$LineNo,
								$StockID,
								$Qty,
								$ItemDescr,
								$UOM,
								$DecimalPlaces,
								$ExpiryDate){

		if (isset($Qty) and $Qty!=0){

			$this->LineItems[$LineNo] = new LineDetails($LineNo,
														$StockID,
														$Qty,
														$ItemDescr,
														$UOM,
														$DecimalPlaces,
														$ExpiryDate);
			$this->LinesOnTender++;
			Return 1;
		}
		Return 0;
	}

	function add_supplier_to_tender(	$SupplierCode,
									$SupplierName,
									$Emailaddress){

		if (!isset($this->Suppliers[$SupplierCode])){

			$this->Suppliers[$SupplierCode] = new Supplier($SupplierCode, $SupplierName, $Emailaddress);
			$this->SuppliersOnTender++;
			Return 1;
		}
		Return 0;
	}

	function update_tender_item($LineNo,
								$Qty,
								$Price,
								$ExpiryDate){

			$this->LineItems[$LineNo]->Quantity = $Qty;
			$this->LineItems[$LineNo]->Price = $Price;
			$this->LineItems[$LineNo]->ExpiryDate = $ExpiryDate;
	}

	function remove_item_from_tender(&$LineNo){
		unset($this->LineItems[$LineNo]);
		$this->LinesOnTender--;
	}

	function remove_supplier_from_tender(&$SupplierCode){
		unset($this->Suppliers[$SupplierCode]);
		$this->SuppliersOnTender--;
	}

	function Tender_Value() {
		$TotalValue=0;
		foreach ($this->LineItems as $OrderedItems) {
			$TotalValue += ($OrderedItems->Price)*($OrderedItems->Quantity);
		}
		return $TotalValue;
	}
} /* end of class defintion */

Class LineDetails {
/* PurchOrderDetails */
	var $LineNo;
	var $StockID;
	var $ItemDescription;
	var $Quantity;
	var $Price;
	var $Units;
	var $DecimalPlaces;
	var $Deleted;
	var $ExpiryDate;

	function LineDetails ($LineNo,
							$StockItem,
							$Qty,
							$ItemDescr,
							$UOM,
							$DecimalPlaces,
							$ExpiryDate) {

	/* Constructor function to add a new LineDetail object with passed params */
		$this->LineNo = $LineNo;
		$this->StockID =$StockItem;
		$this->ItemDescription = $ItemDescr;
		$this->Quantity = $Qty;
		$this->Units = $UOM;
		$this->DecimalPlaces = $DecimalPlaces;
		$this->ExpiryDate = $ExpiryDate;
		$this->Deleted = False;
	}
}

Class Supplier {

	var $SupplierCode;
	var $SupplierName;
	var $EmailAddress;
	var $Responded;

	function Supplier ($SupplierCode,
						$SupplierName,
						$EmailAddress) {
		$this->SupplierCode = $SupplierCode;
		$this->SupplierName = $SupplierName;
		$this->EmailAddress = $EmailAddress;
		$this->Responded = 0;
	}
}

?>
