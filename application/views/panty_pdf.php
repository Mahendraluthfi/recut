<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Request Panty</title>
    <!-- <link rel="stylesheet" href="/var/www/html/ppnotes/assets/css/pdf/bootstrap.min.css">
    <script src="/var/www/html/ppnotes/assets/css/pdf/bootstrap.min.js"></script> -->

    <link rel="stylesheet" href="C:\xampp\htdocs\recut\dist\css\pdf\bootstrap.min.css">
    <script src="C:\xampp\htdocs\recut\dist\css\pdf\bootstrap.min.js"></script>


</head>
<style>
    /*@font-face {
        font-family: "Ubuntu";
        src: url("/var/www/html/ppnotes/assets/css/pdf/Ubuntu-Regular.ttf");
    }*/

    @font-face {
        font-family: "Ubuntu";
        src: url("C:/xampp/htdocs/recut/dist/css/pdf/Ubuntu-Regular.ttf");
    }

    @page { 
        /*margin: 0px; */
    }
    body { 
        /*margin: 0px; */
        /*margin-left: 30px;*/
        font-family: 'Ubuntu';
        margin-top: -30px;
        margin-right: : 50px;
    }

    /*@media print {*/
        .page-break {
            page-break-before: always;
        }
        .font-content{
            font-size: 12px;
        }       
    /*}*/
    
</style>
<body>
    <div class="row">
        <div class="col-xs-9">
            <legend>Recut Detail Sheet - Panty</legend>
        </div>
        <div class="col-xs-2 text-right text-danger">
            <?php echo '#PNTY_REQ-'.$get->order_id; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-8">
            <table class="table table-bordered">            
                <tr>
                    <td class="active">#PO</td>
                    <td class="text-primary"><?php echo $get->po ?></td>
                    <td class="active">Datetime</td>
                    <td class="text-primary"><?php echo date('d-M', strtotime($get->date)).'/'.date('H:i', strtotime($get->time)) ?></td>
                </tr>
                <tr>
                    <td class="active">#SO</td>
                    <td class="text-primary"><?php echo $get->so ?></td>
                    <td class="active">Estimated</td>
                    <td class="text-primary"><?php echo date('H:i', strtotime($get->time_estimated)) ?></td>
                </tr>                
                <tr>
                    <td class="active">LINE</td>
                    <td class="text-primary"><?php echo $get->line ?></td>
                    <td class="active">Style</td>
                    <td class="text-primary"><?php echo $get->style ?></td>
                </tr>  
                <tr>
                    <td class="active">Shift</td>
                    <td class="text-primary"><?php echo $get->shift ?></td>
                    <td class="active">Colour</td>
                    <td class="text-primary"><?php echo $get->colour ?></td>
                </tr>                                                
            </table>
        </div>              
        <div class="col-xs-3">                                
            F - Fabric Damage <br>                          
            S - Sewing Damage <br>                          
            C - Cutting Damage                                                          
        </div>

    </div>
    <table class="table table-bordered table-sm">
        <thead>
            <tr class="text-center active">
                <td>SIZE</td>
                <td>GUSSET</td>
                <td>FRONT</td>
                <td>BACK</td>
                <td>SIDE</td>
                <td>INNER</td>
                <td>REMARKS</td>                            
            </tr>
        </thead>
        <tbody>
            <?php foreach ($detail as $data) { ?>
                <tr class="text-center">
                    <td><?php echo $data->size ?></td>
                    <td><?php echo $data->gusset ?></td>
                    <td><?php echo $data->front ?></td>
                    <td><?php echo $data->back ?></td>
                    <td><?php echo $data->side ?></td>
                    <td><?php echo $data->inners ?></td>
                    <td><?php echo $data->remarks ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-xs-3">            
            Total Gusset : <span class="text-danger"><?php echo $total->totgusset ?></span><br>
            Total Front : <span class="text-danger"><?php echo $total->totfront ?></span><br>
            Total Back : <span class="text-danger"><?php echo $total->totback ?></span><br>
            Total Side : <span class="text-danger"><?php echo $total->totside ?></span><br>
            Total Inner : <span class="text-danger"><?php echo $total->totinners ?></span>                                          
        </div>
        <div class="col-xs-2">            
            <div class="text-center">
                <p><u>Check by QA</u></p>
                <span class="text-danger" style="font-size: 16px; font-weight: bold;">
                    <?php 
                    if ($get->check_qa == 1) {
                        echo "APPROVED";
                    }else{
                        echo "(empty)";
                    }
                    ?>
                </span>
            </div>                
        </div>
        <div class="col-xs-2">                        
            <div class="text-center">
                <p><u>Check by VSE</u></p>
                <span class="text-danger" style="font-size: 16px; font-weight: bold;">
                    <?php 
                    if ($get->check_vse == 1) {
                        echo "APPROVED";
                    }else{
                        echo "(empty)";
                    }
                    ?>
                </span>
            </div>                        
        </div>
        <div class="col-xs-2">                        
            <div class="text-center">
                <p><u>Check by CUTTING</u></p>
                <span class="text-danger" style="font-size: 16px; font-weight: bold;">
                    <?php 
                    if ($get->check_cutting == 1) {
                        echo "APPROVED";
                    }else{
                        echo "(empty)";
                    }
                    ?>
                </span>
            </div>                        
        </div>
    </div><hr>
</body>
</html>