<?php
/*
 * This is the outline of the webERP manual
**/
$TOC_Array = array (
'TableOfContents'   => array(
    'Introduction'      => array('Introduction',
                                 'Why another accounting program?'),
    'Requirements'      => array('Requirements',
                                 'Hardware requirements',
                                 'Software requirements',
                                 'Using webERP with a Wiki'),
    'GettingStarted'    => array('Getting started',
                                 'Prerequisites',
                                 'Copying the PHP Scripts',
                                 'Creating the database',
                                 'Editing config.php',
                                 'Logging in for the first time',
                                 'Themes and GUI modification',
                                 'Setting up users'),
    'SecuritySchema'    => array('Security schema'),
    'CreatingNewSystem' => array('Creating a new system',
                                 'Running the Demonstration database',
                                 'Setting up a system',
                                 'Setting up inventory items',
                                 'Entering inventory balances',
                                 'Inventory Ledger integration to General Ledger issues',
                                 'Setting up customers',
                                 'Entering customer balances',
                                 'Reconciling the debtors ledger control account',
                                 'Finally'),
    'SystemConventions' => array('System Conventions',
                                 'Navigating the menu',
                                 'Reporting'),
    'Inventory'         => array('Inventory (aka "Stock")',
                                 'Overview',
                                 'Inventory system features',
                                 'Inventory categories',
                                 'Adding inventory items',
                                 'Item code',
                                 'Part descriptions',
                                 'Categories',
                                 'Unit of measurement',
                                 'Economic order quantity',
                                 'Packaged volume',
                                 'Packaged weight',
                                 'Units of measure',
                                 'Current or obsolete',
                                 'Make or buy',
                                 'Setting up assembly items',
                                 'Controlled',
                                 'Serialised',
                                 'Bar code',
                                 'Discount category',
                                 'Decimal places',
                                 'Inventory costing',
                                 'Material cost',
                                 'Labour cost',
                                 'Overhead cost',
                                 'Standard costing considerations',
                                 'Actual cost',
                                 'Alterations to labour cost, material cost or overhead cost',
                                 'Selecting inventory items',
                                 'Amending inventory items',
                                 'Changing a category',
                                 'Alterations to the Make or Buy flag',
                                 'Inventory categories',
                                 'Inventory category code',
                                 'Inventory category description',
                                 'Balance sheet inventory GL account',
                                 'Inventory adjustments GL posting sccount',
                                 'Purchase price variance account',
                                 'Material usage variance account',
                                 'Type of resource',
                                 'Inventory location maintenance',
                                 'Inventory adjustments',
                                 'Internal inventory requests',
                                 'Inventory location transfers',
                                 'Inventory reports and inquiries',
                                 'Inventory status inquiries',
                                 'Inventory movement inquiries',
                                 'Inventory usage inquiries',
                                 'Inventory valuation report',
                                 'Inventory planning report',
                                 'Inventory checks'),
    'AccountsReceivable'=> array('Accounts Receivable',
                                'Overview',
                                'Features',
                                'Entering new customers',
                                'Customer code',
                                'Customer name',
                                'Address line 1,2,3 and 4',
                                'Currency',
                                'Invoice discount',
                                'Prompt payment discount',
                                'Customer since',
                                'Payment terms',
                                'Credit status or rating',
                                'Credit limit',
                                'Invoice addressing',
                                'Entering customer branches',
                                'Branch name',
                                'Branch code',
                                'Branch contact/phone/fax/address',
                                'Sales person',
                                'Draw stock from',
                                'Forward date from a day in the month',
                                'Delivery days',
                                'Phone/fax/email',
                                'Tax authority',
                                'Disable transactions',
                                'Default freight company',
                                'Postal address 1,2,3 and 4',
                                'Amending customer details',
                                'Shippers'),
    'CreditNotes'       => array('Creating Credit Notes',
								 'Crediting an Invoice',
								 'Creating Credit Notes Manually',
								 'Allocating Credit Notes'),
    'AccountsPayable'   => array('Accounts Payable',
                                 'Overview',
                                 'Features',
                                 'Entering new suppliers',
                                 'Supplier code',
                                 'Supplier name',
                                 'Address line 1,2,3 and 4',
                                 'Supplier since',
                                 'Payment terms',
                                 'Bank particulars/reference',
                                 'Bank account number',
                                 'Currency',
                                 'Remittance advice'),
    'SalesPeople'       => array('Sales People',
                                  'Salesperson records',
                                  'Salesperson code',
                                  'Salesperson name, telephone and fax numbers',
                                  'Salesperson commission rates and breakpoint'),
    'SalesTypes'        => array('Sales types/price lists',
                                'Sales type code',
                                'Sales type description'),
    'PaymentTerms'      => array('Payment terms',
                                 'Payment terms code',
                                 'Payment terms description',
                                 'days before due/day in following month when due'),
    'CreditStatus'      => array('Credit status',
                                 'Credit status ratings',
                                 'Status code',
                                 'Status description',
                                 'Disallow invoices'),
    'Prices'            => array('Prices and Discounts',
                                 'Pricing overview',
                                 'Maintaining prices',
                                 'Discount matrix'),
    'ARTransactions'    => array('Accounts Receivable Transactions',
                                 'Invoicing an order',
                                 'Selecting an order to invoice',
                                 'Producing an invoice from a selected order',
                                 'Credit notes',
                                 'Entry of receipts',
                                 'Receipts - customer',
                                 'Receipts - Date',
                                 'Receipts - currency and exchange rate',
                                 'Receipts - payment method',
                                 'Receipts - amount',
                                 'Receipts - discount',
                                 'Receipts - allocating to invoices',
                                 'Differences on exchange',
                                 'Receipts processing',
                                 'Deposits listing',
                                 'Allocate credits to a customer\'s account',),
    'ARInquiries'       => array('Accounts receivable inquiries',
                                 'Customer inquiries',
                                 'Customer account inquiries',
                                 'Transaction detail inquiries'),
    'ARReports'         => array('Accounts receivable reports',
                                  'Customers - reporting',
                                  'Aged customer balance listing',
                                  'Customer statements',
                                  'Customer transaction listing options',
                                  'Printing invoices or credit notes'),
    'SalesAnalysis'     => array('Sales analysis',
                                 'Sales analysis report headers',
                                 'Sales analysis report columns',
                                 'Automating sales reports'),
    'SalesOrders'       => array('Sales orders',
                                 'Sales order functionality',
                                 'Entry of sales orders',
                                 'Sales orders - selection of the customer and branch',
                                 'Selection of order line items',
                                 'Delivery details',
                                 'Modifying an order',
                                 'Quotations',
                                 'Recurring orders',
                                 'Counter sales - entering sales directly',
								 'Managing discounts by product group and customer group (Matrix)'),
    'Sales'				=> array('Picking Lists',
								 'Generate/Print Picking Lists',
								 'Maintain Picking Lists'),
    'PurchaseOrdering'  => array('Purchase ordering',
                                 'Overview',
                                 'Purchase orders',
                                 'Adding a new purchase order',
                                 'Authorising purchase orders',
                                 'Receiving purchase orders'),
    'SupplierTenders'   => array('Supplier Tenders',
								 'Overview',
								 'Creating A Tender',
								 'Editing A Tender',
								 'Supplier Offers',
								 'Actioning An Offer'),
    'Shipments'         => array('Shipments',
                                 'Shipment general ledger posting',
                                 'Creating shipments',
                                 'Shipment costings',
                                 'Closing a shipment'),
    'Contracts'   => array('Contract Costing',
                                 'Contract costing overview',
                                 'Creating a new contract',
                                 'Selecting a contract',
                                 'Charging against contracts'),
    'Manufacturing'     => array('Manufacturing',
                                 'Manufacturing overview',
                                 'General ledger implications',
                                 'Work order entry',
                                 'Work order receipts',
                                 'Work order issues',
                                 'Closing work orders'),
     'QualityAssurance' => array('Quality Assurance',
								'Overview',
								'Tests Maintenance',
								'Product Specifications',
								'Copying Specification',
								'Print Product Specification',
								'Logging Samples',
								'Entering Test Results',
								'Print Certificate of Analysis',
								'View Historical Results'),
    'MRP'               => array('Material requirements planning',
                                 'MRP Overview',
                                 'Base data required',
                                 'Production calendar',
                                 'Master (Production) Schedule',
                                 'Running the MRP calculation',
                                 'How it works',
                                 'MRP Reports'),
    'GeneralLedger'     => array('General Ledger',
                                 'General ledger overview',
                                 'Account groups',
                                 'Bank accounts',
                                 'Bank account payments',
                                 'General ledger integration setup',
                                 'Sales journals',
                                 'Stock journals',
                                 'EDI',
                                 'EDI setup',
                                 'Sending EDI Invoices'),
    'PettyCash'         => array('Petty cash management system',
                                 'Overview',
                                 'Setup general parameters'),
    'FixedAssets'       => array('Fixed Assets Manager',
                                 'Fixed assets overview',
                                 'Creating a fixed asset',
                                 'Selecting fixed assets',
                                 'Depreciation run',
                                 'Fixed asset schedule',
                                 'Maintenance tasks'),
    'Setup'   		    => array('Setup',
                                 'General Setup Options',
                                 'Receivables/Payables Setup',
                                 'Inventory Setup'),
    'Tax'               => array('Tax',
                                 'Tax calculations',
                                 'Overview',
                                 'Setting up taxes',
                                 'Sales only within one Tax Authority example - 2 Tax levels:',
                                 'Sales only within one Tax Authority example - 3 Tax Levels:',
                                 'Sales within two Tax Authorities example - 3 tax levels:'),
    'ReportBuilder'     => array('SQL Report Writer',
                                 'Report writer introduction',
                                 'Reports administration',
                                 'Importing and exporting reports',
                                 'Editing, copying, renaming, reports',
                                 'Creating a new report - identification',
                                 'Creating a new report - page setup',
                                 'Creating a new report - Specifying database tables and links',
                                 'Creating a new report - specifying fields to retrieve',
                                 'Creating a new report - entering and arranging criteria',
                                 'Viewing reports'),
    'Multilanguage'     => array('Multilanguage',
                                 'Introduction to multilanguage',
                                 'Rebuild the system default language file',
                                 'Add a new language to the system',
                                 'Edit a language file header',
                                 'Edit a language file module'),
    'SpecialUtilities'  => array('Special utilities',
                                 'Reapply standard costs to sales analysis',
                                 'Change a customer code',
                                 'Change an inventory code',
                                 'Make stock locations',
                                 'Repost general ledger from period'),
	'EDI'				=> array('EDI',
								 'EDI Setup',
								 'Sending EDI Invoices'),
    'NewScripts'        => array('Development - Foundations',
                                 'Directory structure',
                                 'session.php',
                                 'header.php',
                                 'footer.php',
                                 'config.php',
                                 'PDFStarter.php',
                                 'Database abstraction - ConnectDB.inc',
                                 'DateFunctions.inc',
                                 'SQL_CommonFunctions.inc'),
    'APITutorial'       => array('API Tutorial'),
    'APIFunctions'       => array('API Function reference'),
    'DevelopmentStructure' => array('Development Structure',
                                'Sales orders',
                                'Pricing',
                                'Delivery and freight charges',
                                'Finding sales orders',
                                'Invoicing',
                                'Accounts receivable/debtors accounts',
                                'Accounts receivable receipts',
                                'Accounts receivable allocations',
                                'Sales analysis',
                                'Purchase orders',
                                'Inventory',
                                'Stock inquiries',
                                'Accounts payable',
                                'Supplier payments'),
    'Contributors'     => array('Contributors - Acknowledgements')
    )
);

?>
