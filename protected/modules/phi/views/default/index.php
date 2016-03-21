<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    $this->module->id,
);
?>

<div class='table'>
    <table>
        <tr>
            <th colspan='2'>
                <font size='+2'>PHI Module Main Page</font> 
            </th>
        </tr>
        <tr>
            <td>
                <table>
                    <tr>
                        <th>
                            <font size='+1'>Search Tools</font>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                <li><a href="/mctp-lims/phi/patient/admin">List All Patients</a></li>
                                <li><a href="/mctp-lims/phi/pathEventSample/pathEventSampleQueue">List All Samples Queued for Derivative Creation</a></li> 
                                <li><a href="/mctp-lims/phi/pathEventSample/derivQueue">List All Derivatives Queued for Isolate Creation</a></li>

                            </ul>  
                        </td>
                    </tr>
                </table>
            </td>
            <td>
                <table>
                    <tr>
                        <th>
                            <font size='+1'>Processing Tools</font>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <ul><li><a href="/mctp-lims/phi/patient/create">Create Patient</a></li>
                                <li><a href="/mctp-lims/phi/pathEventSample/pathEventSampleCreateDeriv">Create Derivatives from Sample Queue</a></li>
                                <li><a href="/mctp-lims/phi/pathEventSample/createClinIsolate">Create Clinical Isolates from Derivatives</a></li>                     

                            </ul>  
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                <table>
                    <tr>
                        <th>
                            <font size='+1'>Admin Tools</font>
                        </th>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                <li><a href="/mctp-lims/phi/phiAuditTrail/admin">PHI Audit Trail</a></li>
                                <li>
                                    <a href="/mctp-lims/phi/phiAuditTrail/auditPatient">
                                        Audit Trail by Patient</a>
                                </li>                           
                            </ul>  
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

</div>