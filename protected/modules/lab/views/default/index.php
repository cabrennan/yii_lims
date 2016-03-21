<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>

<h1> Lab Area Main Page</h1>


<ul>
      <li><a href="/mctp-lims/lab/cases/admin">Cases</a></li>
    <li><a href="/mctp-lims/lab/caseStudy">Case_Study Info</a>
    <li><a href="/mctp-lims/lab/sample">Samples</a></li>    
    <li><a href="/mctp-lims/lab/derivative/admin">Derivatives</a></li>
    <li><a href="/mctp-lims/lab/sampleDeriv/admin">Sample - Derivative List</a></li>
    <li><a href="/mctp-lims/lab/cellLine">Cell Line Info</a></li>   
    
    <li><a href="/mctp-lims/lab/icd3/admin">ICD-O-3</a> National Cancer Institute International Classification of Diseases for Oncology
           downloaded Oct 30, 2014</li>
  
    <li><a href="/mctp-lims/lab/poMaster">List Purchase Orders</a></li>
    <li><a href="/mctp-lims/lab/snp166">Snp 166 Files</a></li>
    <li><a href="/mctp-lims/lab/patientSnpConcordance/admin">Patient Snp Concordance</a></li>
    <li>Lab Processing
        <ul>
            <li><a href="/mctp-lims/lab/libBatch/admin">Library Batches</li>
        </ul>
    </li>
    <li>Lab Admin
        <ul>
            <li><a href="/mctp-lims/lab/instrument/index">Instruments</a></li>
            <li><a href="/mctp-lims/lab/barcode/admin">Barcodes</a></li>
            <li><a href="/mctp-lims/lab/tissues">Tissues</a></li>
            <li><a href="/mctp-lims/lab/cancers">Cancers</a></li>
            <li><a href="/mctp-lims/lab/race">Races</a></li>
            <li><a href="/mctp-lims/lab/ethnicity">Ethnicities</a></li> 
              <li>Library Prep
                <ul><li><a href="/mctp-lims/lab/libProtocol/admin">Library Prep Protocols</a></li>
                    <li><a href="/mctp-lims/lab/benchStep/admin">Bench Steps</a></li>
                    <li><a href="/mctp-lims/lab/libProtocolStep/admin">Protocol Bench Steps</a></li>
                </ul>
            </li>
            
            
            
            <li>Inventory
                <ul><li><a href="/mctp-lims/lab/supplier/admin">Suppliers</a></li>
                    <li><a href="/mctp-lims/lab/reagent/admin">Reagents</a></li>
                    <li><a href="/mctp-lims/lab/reagentKitItem/admin">Reagent Kit Items</a></li>
                    <li><a href="/mctp-lims/lab/reagentInv/admin">Reagent Inventory</a></li>
                </ul>
            </li>
        </ul>
    </li>
</ul>