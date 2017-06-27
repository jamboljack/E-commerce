<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('logged_in_member')) redirect(site_url('login'));
		$this->load->library('template_front');
		$this->load->model('checkout_model');
		$this->load->model('menu_model');
	}
	
	public function index() {
		if ($this->session->userdata('logged_in_member')) { // Jika Sudah Login, Maka tampilkan semua Item Order
			$data['detail'] 	= $this->checkout_model->select_detail()->row();
			$data['listRegion'] = $this->checkout_model->select_region()->result();
			$data['listItem'] 	= $this->checkout_model->select_all_item()->result();
			$this->template_front->display('checkout_v', $data);
		} else {
			// Jika Belum, Tampil Halaman Login/Register
			$this->session->sess_destroy();
			redirect(site_url('login'));
		}
	}

	public function savedata() {
		// List Order Temporary
		$listItem 	= $this->checkout_model->select_all_item()->result();
		if (count($listItem) > 0) {
			// Insert into Order
			$username = $this->session->userdata('username'); // Username / Email
			$data = array(	'user_username'		=> $username,
							'order_date'		=> date('Y-m-d'),
							'order_time'		=> date('Y-m-d H:i:s'),
							'order_payment'		=> $this->input->post('chkPayment'),
							'order_comment'		=> $this->input->post('comment'),
					   		'order_update' 		=> date('Y-m-d H:i:s')
			);

			$this->db->insert('furnindo_order', $data);
			$order_id = $this->db->insert_id(); // Order ID baru

			// Insert ke Detail Order
			foreach ($listItem as $r) {
				$data = array(	'order_id'			=> $order_id,
								'product_id'		=> $r->product_id,
								'detail_qty'		=> $r->temp_qty,
						   		'detail_update' 	=> date('Y-m-d H:i:s')
				);

				$this->db->insert('furnindo_order_detail', $data);
			}

			// Insert ke Shipping
			$data = array(	'order_id'			=> $order_id,
							'shipping_name'		=> strtoupper($this->input->post('ship_name', 'true')),
							'shipping_address'	=> strtoupper($this->input->post('ship_address', 'true')),
							'region_id'			=> $this->input->post('lstRegion', 'true'),
							'shipping_city'		=> strtoupper($this->input->post('ship_city', 'true')),
							'shipping_zipcode'	=> strtoupper($this->input->post('ship_zipcode', 'true')),
							'shipping_phone'	=> strtoupper($this->input->post('ship_phone', 'true')),
					   		'shipping_update' 	=> date('Y-m-d H:i:s')
			);

			$this->db->insert('furnindo_shipping', $data);

			// Delete Data Temporary
			$this->db->where('user_username', $username);
			$this->db->where('temp_date_order', date('Y-m-d'));
			$this->db->delete('furnindo_order_temp');
			
			// Data Order
			$detailOrder    = $this->checkout_model->select_detail_order($order_id)->row();
			// Send Email
			$email 			= $this->session->userdata('username'); // Email
			$sender_email 	= 'eregister@hotelhomkudus.com';
			$sender_name 	= 'no-reply';
			$subject 		= 'Order No [#'.$order_id.'] - KcFurnindo Jepara';
			$message 		= '<html><body>';
			$message 		.= '<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">';
			$message 		.= '<tr>
									<td align="center" colspan="6"><h2 style="color:#f40;">Thank You for Order from KcFurnindo Jepara</h2></td>
								</tr>';
			$message 		.= '<tr>
									<td width="15%">Order No.</td>
								    <td width="1%">:</td>
								    <td colspan="4"><b>'.$detailOrder->order_id.'</b></td>
								</tr>
								<tr>
									<td>Order Date / Time</td>
									<td>:</td>
									<td colspan="4"><b>'.$detailOrder->order_date.' / '.$detailOrder->order_time.'</b></td>
								</tr>
								<tr>
									<td>Payment</td>
									<td>:</td>
									<td colspan="4"><b>Bank Transfer</b></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td><b>Personal Detail</b></td>
									<td>&nbsp;</td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td>Name</td>
									<td>:</td>
									<td width="35%">'.ucwords(strtolower($detailOrder->user_name)).'</td>
									<td width="11%">Address</td>
									<td width="1%">:</td>
									<td width="37%">'.ucwords(strtolower($detailOrder->user_address)).'</td>
								</tr>
								<tr>
									<td>Region</td>
									<td>:</td>
									<td>'.ucwords(strtolower($detailOrder->region_name)).'</td>
									<td>City</td>
									<td>:</td>
									<td>'.ucwords(strtolower($detailOrder->user_city)).'</td>
								</tr>
								<tr>
									<td>Zip Code</td>
									<td>:</td>
									<td>'.$detailOrder->user_zipcode.'</td>
									<td>Phone</td>
									<td>:</td>
									<td>'.$detailOrder->user_phone.'</td>
								</tr>';
			$message 		.= '<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td><b>Shipping Address</b></td>
									<td>&nbsp;</td>
									<td colspan="4">&nbsp;</td>
								</tr>
								<tr>
									<td>Name</td>
									<td>:</td>
									<td width="35%">'.ucwords(strtolower($detailOrder->shipping_name)).'</td>
									<td width="11%">Address</td>
									<td width="1%">:</td>
									<td width="37%">'.ucwords(strtolower($detailOrder->shipping_address)).'</td>
								</tr>
								<tr>
									<td>Region</td>
									<td>:</td>
									<td>'.ucwords(strtolower($detailOrder->negara)).'</td>
									<td>City</td>
									<td>:</td>
									<td>'.ucwords(strtolower($detailOrder->shipping_city)).'</td>
								</tr>
								<tr>
									<td>Zip Code</td>
									<td>:</td>
									<td>'.$detailOrder->shipping_zipcode.'</td>
									<td>Phone</td>
									<td>:</td>
									<td>'.$detailOrder->shipping_phone.'</td>
								</tr>';
			$message 		.= '</table>';
			$message 		.= '<p>Your Detail Item :</p>';
			$message 		.= '<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">';
			$message 		.= '<tr>
									<td>Product Name</td>
                                	<td width="30%">Category</td>
                                	<td width="10%">Quantity</td>
								</tr>';

			foreach($listItem as $p) {
			$message 		.= '<tr>';
			$message 		.= '<td>'.$p->product_name.'</td>';
			$message 		.= '<td>'.$p->category_name.'</td>';
			$message 		.= '<td>'.$p->temp_qty.'</td>';
			$message 		.= '<tr>';
			}
			$message 		.= '</table>';
			$message 		.= '</body></html>';


			$this->load->library('email');
			$this->email->set_mailtype("html");
			$this->email->from($sender_email, $sender_name);
			$this->email->to($email);
			$this->email->subject($subject);
			$this->email->message($message);
			$this->email->send();

		 	redirect(site_url('checkout/finish/'.$order_id));
		} else {
			$this->session->set_flashdata('notificationempty','Cancel, Your Chart is Empty. Please Order our Product First.');
			redirect(site_url('chart'));
		}
	}

	public function finish() {
		$this->template_front->display('chart_finish_v');
	}
}
/* Location: ./application/controller/Checkout.php */
?>