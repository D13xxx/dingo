<?php

namespace frontend\libs;

use Yii;
use common\models\Otp;
use common\models\Contract;
use common\models\Products;

/**
 * Login form
 */
class Library
{
    private $pti_api_url = 'http://gateway.ptidigital.vn/api/PTIInsurance/';
    private $pti_api_key = 'E5BE28157A7E418DB53724AB73460F33';
    private $pti_serct_key = 'f615d657815a5a78369c09c6d9debd4dfd19015961a250497aa1415d362aa28dd203d3159b7c294edc0ba83c9a910c51290a1b27f6c595f4a3c8d227ae8595eb';

    //private $pti_api_url = 'http://demogateway.ptidigital.vn/api/PTIInsurance/';
    //private $pti_api_key = '37919A6FFE154FC6979B7EC47E1B65C7';
    //private $api_serct_key = 'e6681fc398519bcd00c46ae906b54d6d5a895d479dd41b0a8af1b281fc34c1f0f4d756b671344618fc6d13ebfcf6326c1ab0d3925bf7b1011b5e6de489554b17';

    public static function actionGetotp($phone)
    {
        $phone = Library::convertPhone($phone);
        $otp = Library::generateNumericOTP(6);
        $acc = Otp::find()->where(['msisdn' => $phone])->count();

        if ($acc > 0) {
            self::actionUpdateOtp($phone, $otp);
        } else {
            self::actionNewOtp($phone, $otp);
        }

        self::sendsms($phone, "$otp la ma otp dang nhap baohiemso.net", "NGAYTN");
    }

    public static function generateNumericOTP($n)
    {

        $generator = "1357902468";

        $result = "";

        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }

        // Return result
        return $result;
    }

    public static function write_log($content, $path)
    {
        $date_time = date("Y-m-d H:i:s");
        $file = fopen("logs/" . date("Y-m-d") . "_" . $path, "a");
        fwrite($file, $date_time . "$content \n");
        fclose($file);
    }

    public static function get_client_ip()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if (isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if (isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    /**
     * @param $phone
     * @param $otp
     */
    protected static function actionNewOtp($phone, $otp)
    {
        $model = new Otp();
        $model->otp = $otp;
        $model->msisdn = $phone;
        $model->date_created = date('Y-m-d H:i:s');
        $model->save();
    }

    /**
     * @param $phone
     * @return array|Otp|\yii\db\ActiveRecord|null
     */
    protected static function actionUpdateOtp($phone, $otp)
    {
        $Model = Otp::find()->where(['msisdn' => $phone])->one();
        $Model->otp = $otp;
        $Model->date_created = date('Y-m-d H:i:s');
        $Model->save();
    }



    protected static function execPostRequestInfo($url, $jsonContent)
    {
        $url = "http://14.225.7.169:8080/vasAPI/" . $url;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, "$jsonContent");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        // var_dump($output);
        // die;
        return $output;
    }



    public static function sendsms($phone, $content, $code)
    {

        // $requestid = date("YmdHsi").rand(10,99);

        $data['msisdn'] = array("$phone");
        $data['packagename'] = "$code";
        $data['msg'] = "$content";
        $data['push'] = 0;
        $data_json = json_encode($data);

        $URL = "sendsms";
        $result = self::execPostRequestInfo($URL, $data_json);

        //  var_dump($result); die;
        return $result;
    }

    public static function getPTIID($id, $code)
    {

        if ($id > 9999) {
            return $code . "$id";
        }
        if ($id > 999) {
            return $code . "0" . $id;
        }
        if ($id > 99) {
            return $code . "00" . $id;
        }
        if ($id > 9) {
            return $code . "000" . $id;
        }
        return $code . "0000" . $id;
    }

    public static function Convert_vi_to_en($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", "a", $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", "e", $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", "i", $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", "o", $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", "u", $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", "y", $str);
        $str = preg_replace("/(đ)/", "d", $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", "A", $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", "E", $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", "I", $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", "O", $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", "U", $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", "Y", $str);
        $str = preg_replace("/(Đ)/", "D", $str);
        //$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
        return $str;
    }


    public static function excuteRequestPti($data, $url, $method)
    {

        $payload = json_encode($data);

        // echo $payload; die;
        // Prepare new cURL resource
        $ch = curl_init('http://gateway.ptidigital.vn/api/PTIInsurance/'. $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        if ($method == "POST") {
            curl_setopt($ch, CURLOPT_POST, true);
        } else {
            curl_setopt($ch, CURLOPT_POST, false);
        }

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($data != NULL) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        }

        // Set HTTP Header for POST request
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'apikey: E5BE28157A7E418DB53724AB73460F33',
                'apisecret: f615d657815a5a78369c09c6d9debd4dfd19015961a250497aa1415d362aa28dd203d3159b7c294edc0ba83c9a910c51290a1b27f6c595f4a3c8d227ae8595eb'
            )
        );

        // Submit the POST request
        $result = curl_exec($ch);

        var_dump($result);
        die;
        // Close cURL session handle
        curl_close($ch);

        return json_decode($result);
    }

    public static function convertPhone($phone)
    {
        if (substr($phone, 0, 1) == 0) {
            $phone = "84" . substr($phone, 1, strlen($phone) - 1);
        }

        return $phone;
    }


    public static function buildDate($product)
    {
        $datenow = date('Y-m-d H:i');
        $tmp['createdate'] = $datenow;
        $tmp['approvedate'] = $datenow;
        $tmp['activedate'] = $datenow;

        if ($product->periodic == 3) {
            $first_date = strtotime('+1 day', strtotime($datenow));
            $expriesdate = date('Y-m-d H:i', $first_date);
        } else if ($product->periodic == 4) {
            $first_date = strtotime('+7 day', strtotime($datenow));
            $expriesdate = date('Y-m-d H:i', $first_date);
        } else {
            $first_date = strtotime('+1 month', strtotime($datenow));
            $expriesdate = date('Y-m-d H:i', $first_date);
        }

        $tmp['expriesdate'] = $expriesdate;

        return $tmp;
    }

    public static function actionSendSmsSuccess($phone, $code, $dateex)
    {
        // echo $code; die;
        $product = Products::find()->where(['package_code' => $code])->one();

        if ($product != NULL) {
            $bh = ($product->cat_insurrances_id == 1) ? 'VIEN PHI' : 'TAI NAN';

            if ($product->rank == 0) {
                $rank = 'VANG';
            } else if ($product->rank == 1) {
                $rank = 'BAC';
            } else {
                $rank = 'DONG';
            }

            if ($product->periodic == 3) {
                $periodic = 'NGAY';
            } else if ($product->periodic == 4) {
                $periodic = 'TUAN';
            } else {
                $periodic = 'THANG';
            }

            $contract = Contract::find()->where(['product_id' => $product->id, 'cell_phone' => $phone, 'status' => 4])->One();

            if ($contract != NULL) {
                $sms = "Chuc mung Quy khach da nhan duoc an chi Bao hiem";
                $sms = $sms . "\nSo: " . Library::getPTIID($contract->id, $contract->code) . ".";
                $sms = $sms . "\nHo ten KH: " . Library::Convert_vi_to_en($contract->full_name) . ".";
                $sms = $sms . "\nAn chi: " . $bh . ".";
                $sms = $sms . "\nQuyen loi: " . $rank . ".";
                $sms = $sms . "\nHieu luc: ".$dateex.".";
                $sms = $sms . "\nDe biet them thong tin ve quyen loi an chi, truy cap http://baohiemso.net/hop-dong de tra cuu thong tin hoac LH 0913389593 (cuoc goi di dong) de duoc tu van. Tran trong cam on!
        ";

                // echo $sms; die;
                self::sendsms($phone, $sms, "NGAYTN");
            }
        }
    }
}
