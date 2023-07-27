<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sticker Bill | Sunil Traders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <link href="assets/plugins/datatables/datatable.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <!--<link href="assets/fonts/DXOldStandardGroteskNo2.ttf" rel="stylesheet" type="text/css" />-->
    <style type = "text/css">
        /*@media print {*/
        /*    body * {*/
        /*        visibility: hidden;*/
        /*    }*/
        /*    #sticker, #sticker * {*/
        /*         visibility: visible !important;*/
        /*    }*/

        /*    #sticker {*/
        /*            overflow: visible !important; */
        /*            float:none !important;*/
        /*            position: fixed;*/
        /*            left: 0px;*/
        /*            top: 0px;*/
        /*            display:block !important;*/
        /*        }*/
        /*}*/.strickers-desing {
               /*height: 291px !important;*/
               display: flex !important;
               flex-direction: column-reverse !important;
           }
           
  
           
        @media print {
           .widthss h1, .responsive-width  h3{
              color: #000000 !important; 
           } 
        }
         @media print {
           .print-fonts {
               font-size: 40px !important;
               color: #000000 !important; 
           }
           .strickers-desing {
               height: 291px !important;
               display: flex !important;
               flex-direction: column-reverse !important;
           }
        }
        
           @media print {
           .col-height{
                margin-top:2px !important;
        
           }
}
         
    </style>
</head>
<?php 
include('./include/config.php');
$insertId = $_REQUEST['id'];
$counterCount = $_REQUEST['count'];
$meter = $_REQUEST['meter'];
$price = $_REQUEST['price'];
$qualityNo = $_REQUEST['Qno'];
// $counterCount = $_REQUEST['count'];

function printBarcode($counValue,$qNoValue,$meterValue,$priceValue){

    $val = '<xpml><page quantity="0" pitch="50.0 mm"></xpml>
    SIZE 100 mm, 50 mm
    GAP 3 mm, 0 mm
    SET RIBBON ON
    DIRECTION 0,0
    REFERENCE 0,0
    OFFSET 0 mm
    SET PEEL OFF
    SET CUTTER OFF
    SET PARTIAL_CUTTER OFF
    <xpml></page></xpml><xpml><page quantity="1" pitch="50.0 mm"></xpml>SET TEAR ON
    CLS
    CODEPAGE 1252
    TEXT 576,267,"ROMAN.TTF",180,1,12,"S. No."
    TEXT 576,200,"ROMAN.TTF",180,1,12,"Q. No."
    TEXT 576,136,"ROMAN.TTF",180,1,12,"Mtrs."
    TEXT 576,77,"ROMAN.TTF",180,1,12,"Price."
    TEXT 457,266,"ROMAN.TTF",180,1,14,"'.$counValue.'"
    TEXT 457,205,"ROMAN.TTF",180,1,14,"'.$qNoValue.'"
    TEXT 457,141,"ROMAN.TTF",180,1,14,"'.$meterValue.'"
    TEXT 457,84,"ROMAN.TTF",180,1,18,"'.number_format($priceValue,2,".","").'"
    BARCODE 219,350,"128M",52,0,180,2,4,"!1059841603683"
    TEXT 660,302,"0",270,37,28,"'.str_pad($counValue,4,"0",STR_PAD_LEFT).'"
    BAR 74, 224, 410, 3
    BAR 74, 163, 410, 3
    BAR 74, 99, 410, 3
    BAR 74, 29, 410, 3
    BOX 13,5,589,373,9
    PRINT 1,1
    <xpml></page></xpml><xpml><end/></xpml>';

    file_put_contents("Output.prn",trim($val));

    $filePath = realpath("Output.prn");
    $ip_address = getenv("REMOTE_ADDR");
    
// echo "hi";
     if (file_exists($filePath) === TRUE) {
         if (is_writeable($filePath)) {
             try {
                //  shell_exec("copy " . $filePath . ' /B ' . '\\127.0.0.1\zebra_printer');
                shell_exec("copy " . $filePath . ' /B ' . '\\'.$ip_address.'\EPSON TM-T82II Receipt5');
                // shell_exec("copy " . $filePath . ' /B ' . '\\'.$ip_address.'\TSC TTP-244 Pro');
                echo "copy " . $filePath . ' /B ' . '\\'.$ip_address.'\EPSON TM-T82II Receipt5';
                 return 'Command to print prn file executed successfully';
             } catch
             (Exception $e) {
                 return $e->getMessage();
             }
         } else {
             echo 'File ' . $filePath . ' is not writable!';
             return 'File ' . $filePath . ' is not writable!';
         }
     } else {
         echo 'File ' . $filePath . ' does not exist !';
         return 'File ' . $filePath . ' does not exist !';
     }

    // echo $rootDir;
    
    // $cmd = "COPY Output.prn TSC TTP-244 Pro";
    // $cmd = "COPY ".$filePath.'/B \\'.$ip_address.'"\TSC TTP-244 Pro"';
    // $cmd = "COPY \Output.prn \\\MY-PC\BARCODE";
    // $output = shell_exec($cmd);
    
    // $output = shell_exec('whoami');

    //COPY <source> <printer_name>

    // echo $output;

    // system($cmd);
    // var_dump(PHP_OS);
    // echo $cmd ;
    
    // $last_line = system('ls');
}
?>
<!-- <div class="page-wrapper">
    <div class="page-content-tab"> -->
        <div class="container-fluid">
            <div class="row" id="bill">
            <?php 
            for ($i=1; $i <= $counterCount; $i++) { 
                $stickerBillCount = $insertId.$i;
                $sql1 = "INSERT INTO stickerbillcount (stickerBillId,stickerbillCount) VALUES ('$insertId','$stickerBillCount')";
                $result1 = $conn->query($sql1);
            ?>
                <div class="col-12  col-height ps-0" id="sticker">
                    <div class="card strickers-desing body-hg-css mb-2" >
                        <div class="row des-height">
                            <div class="col-3 widthss" style="display: flex;justify-content: center;align-items: center;transform: rotate(90deg);">
                                <!-- <hr> -->
                                <h1><b style="font-size: 4.1875rem;"><?= str_pad($stickerBillCount,4,"0",STR_PAD_LEFT) ?></b></h1>
                            </div>
                            <div class="col-9 responsive-width  ps-0">
                                <div class="card-body hthree print-height padding-rems">
                                    <div class="row border-top-bottom-left-right" style="margin: -8px;padding: 4px;">
                                        <div class="col-6 text-center mt-2" style="display: flex;justify-content: center;align-items: center;">
                                            <img src="assets/images/raymondLogo.png" alt="..."  class="img-fluid" style="display:none">
                                        </div>
                                        <div class="col-6 text-center mt-2" style="display: flex;justify-content: center;align-items: center;">
                                            <img src="assets/images/raymondBarCode.png" alt="..."  class="img-fluid bg-light-alt">
                                        </div>
                                        <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">S.NO.</h3></div>
                                        <div class="col-8 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;"><?= $stickerBillCount ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                        <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">Q.NO.</h3></div>
                                        <div class="col-8 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;"><?= $qualityNo ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                        <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">Mtrs.</h3></div>
                                        <div class="col-8 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;"><?= $meter ?></h3><hr style="margin: 0px;border: 1px solid;"></div>
                                        <div class="col-3 ps-0"><h3 class="ms-2" style="font-size: 2.1875rem;">Price.</h3></div>
                                        <div class="col-8 ps-0 "><h2 class="ms-2 mb-2 print-fonts" style="font-size: 2.1875rem;"><?= number_format($price,2,".","") ?></h2><hr style="margin: 0px;border: 1px solid;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
            printBarcode($stickerBillCount,$qualityNo,$meter,$price);
            }
            // header("location: stickerBill.php");
             ?>                                                          
            </div>
        </div>
    <!-- </div>
</div> -->
<!-- <script>
    let display = window.print();
    if(display){

        window.close();
    }

    let device;
    let dataArray = []
    let messageArray = [
    "SIZE 35 mm,25 mm\r\n",
    "GAP 3 mm,0 mm\r\n",
    "CLS\r\n",
    "TEXT 100,100,\"3\",0,1,1,\"123456\"\r\n",
    "PRINT 1\r\n"
    ]
    messageArray = messageArray.map(x => {
        return (new Uint16Array([].map.call(x, function(c) {
            return c.charCodeAt(0)
        }))).buffer;
    })

    navigator.usb.requestDevice({ filters: [] })
    .then(selectedDevice => {
    device = selectedDevice;
    return device.open(); // Begin a session.
    })
    .then(() => device.selectConfiguration(1)) // Select configuration #1 for the device.
    .then(() => device.claimInterface(0)) // Request exclusive control over interface #2.
    .then(() => device.transferOut(1, messageArray[0]))
    .then(() => device.transferOut(1, messageArray[1]))
    .then(() => device.transferOut(1, messageArray[2]))
    .then(() => device.transferOut(1, messageArray[3]))
    .then(() => device.transferOut(1, messageArray[4]))
    .catch(error => { console.log(error); });
</script> -->
<!-- <script>
    const VENDOR_ID = 4611;
    const commands = `
    SIZE 58 mm,30 mm
    GAP 3 mm,0 mm
    DIRECTION 1,0
    CLS
    QRCODE 24,24,Q,4,A,0,M2,S3,"a=1de5ef9a-896b-4384-8650-821f2524893c"
    CODEPAGE UTF-8
    TEXT 182,28,"2",0,1,1,"ID 2292"
    TEXT 182,58,"2",0,1,1,"ІНВ 00001"
    TEXT 182,88,"2",0,1,1,"Принтер"
    TEXT 182,118,"2",0,1,1,"TSC TTP-244 Pro"
    TEXT 24,210,"2.EFT",0,1,1,"https://my.unio24.com"
    PRINT 1
    `
    export default {
    name: "IndexPage",
    data() {
        return {
        device: null,
        error: null,
        message: VENDOR_ID,
        code: commands,
        log: null
        };
    },
    methods: {
        async sendData() {
        const encoder = new TextEncoder();
        if (this.device) {
            
            var  encodeCommands =  encoder.encode(this.code)
            try {
            this.device.transferOut(1,encodeCommands)
            } catch (e) {
            this.error = "Device disconnected";
            }
        } else {
            this.error = "No device found";
        }
        },
        async connectPrinter() {
        this.error = null;
        console.log(window.navigator.userAgent);
    
        let devices = await navigator.usb.getDevices();
        this.device = devices[0];
        if (devices.length === 0) {
            try {
            this.device = await navigator.usb.requestDevice({filters: [{ vendorId: VENDOR_ID }],});
            } catch (e) {
            this.error = e;
            }
        }
        if (this.device) {
            await this.device.open();
            await this.device.claimInterface(0);
        } else {
            this.error = "No device found";
        }
        },
        async disconnectPrinter() {
        try{
            if (this.device) {
            await this.device.close();
            this.device = null;
            }
        } catch (e) {
            this.error = e
        }
        },
    },
    };
</script> -->
<!-- <script>
    // let display = window.print();
    // if(display){

    //     window.close();
    // }

    // let device;
    let dataArray = []
    let messageArray = [
    "SIZE 35 mm,25 mm\r\n",
    "GAP 3 mm,0 mm\r\n",
    "CLS\r\n",
    "TEXT 100,100,\"3\",0,1,1,\"123456\"\r\n",
    "PRINT 1\r\n"
    ]
    messageArray = messageArray.map(x => {
        return (new Uint16Array([].map.call(x, function(c) {
            return c.charCodeAt(0)
        }))).buffer;
    })
    

    let devices = navigator.usb.getDevices();
      this.device = devices[0];
      if (devices.length === 0) {
        try {
            //  this.device = navigator.usb.requestDevice({ filters: [] });
            this.device = navigator.usb.requestDevice({ filters: [] })
            .then(selectedDevice => {
            device = selectedDevice;
            console.log(device);
            return device.open(); // Begin a session.
            })
            .then(() => device.selectConfiguration(1)) // Select configuration #1 for the device.
            .then(() => device.claimInterface(0)) // Request exclusive control over interface #2.
            .then(() => device.transferOut(1, messageArray[0]))
            .then(() => device.transferOut(1, messageArray[1]))
            .then(() => device.transferOut(1, messageArray[2]))
            .then(() => device.transferOut(1, messageArray[3]))
            .then(() => device.transferOut(1, messageArray[4]))
            .catch(error => { console.log(error); });
        } catch (e) {
        this.error = e;
        }
      }
       console.log(device);
</script> -->