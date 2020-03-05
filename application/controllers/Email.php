<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

     public function send($email_tujuan, $url) {

          $email = $this->input->post('email');

          $config = Array(
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'datamelek@gmail.com',  // Email gmail
            'smtp_pass' => 'S4y@ngku',  // Password gmail
            'smtp_port' => 465,
            'smtp_crypto' => 'ssl',
            'crlf'      => "\r\n",
            'newline'   => "\r\n"
          );

          $this->load->library('email', $config);

          $this->email->from('datamelek@gmail.com', 'jualin.id');
          $this->email->to($email_tujuan);
          $this->email->subject('Ada barang baru ni jualers :)');
          $this->email->message('Hai jualers, kita ada barang baru nih, yuk cek sekarang
               di '.$url.'. Terimakasih <3');

          if($this->email->send()) {
               echo "<sript>alert('Email berhasil dikirim');</script>";
          }
          else {
               echo "<sript>alert('Email gagal dikirim');</script>";
               echo '<br />';
               echo $this->email->print_debugger();
          }
     }


}