<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
		$this->load->view('result_view_page');
		$this->load->view('footer');
	}

	public function results()
	{

		$this->load->view('result_view_page');
	}

	public function std_result()
	{
		// receive student id from ajax
		$sid = $this->input->POST('sid');
		// send std id to the model for searching std result
		$result = $this->get_result->search_student_result($sid);
		$result_img_path = $this->get_result->get_img_path($sid);

		if ($result) {
			// print all result in view page
			foreach ($result as $row) {
?>
				<div class="row heading_result">Final Result</div>
				<div class="row">
					<?php
					if ($result_img_path) {
					?>
						<div class="col-md-3"><img class="std_image" src="https://www.primeuniversity.edu.bd/070513/admin/<?php echo $result_img_path; ?>" alt="No image found"></div>
						<?php
					} else {
					?>
						<div class="col-md-3"><img class="std_image" src="<?php echo base_url(); ?>/assets/img/prime_logo.png" alt="please Wait"></div>
					<?php
					}
					?>
					<div class="col-md-9">
						<table class="">
							<tbody>
								<tr>
									<td class="f_col">ID</td>
									<td class="s_col">: <?php echo $row->s_resultentry_sid; ?></td>
								</tr>
								<tr>
									<td class="f_col">Name</td>
									<td class="s_col">: <?php echo $row->s_resultentry_sname; ?></td>
								</tr>
								<tr>
									<td class="f_col">Batch</td>
									<td class="s_col">: <?php echo $row->s_resultentry_batch; ?></td>
								</tr>
								<tr>
									<td class="f_col">Ending Semester</td>
									<td class="s_col">: <?php echo $row->s_resultentry_semester;  echo " - ". $row->s_resultentry_semester_year; ?></td>
								</tr>
								<tr>
									<td class="f_col">Department</td>
									<td class="s_col">: <?php echo $row->s_resultentry_department; ?></td>
								</tr>
								<tr>
									<td class="f_col">Obtained Degree</td>
									<td class="s_col">: <?php echo $row->s_resultentry_subject; ?></td>
								</tr>
								<tr>
									<td class="f_col">CGPA</td>
									<td class="s_col">: <?php echo $row->s_resultentry_cgpa; ?></td>
								</tr>
								<tr>
									<td class="f_col">Published Date</td>
									<td class="s_col">: <?php echo $row->pdate; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="row pp">
					<div class="form-group searcha">
						<input type="button" onclick="window.print()" value="PRINT RESULT" class="btn btn-md print_button">
					</div>
				</div>
			<?php
			}
			// print_r($result);
		} else {
			?>
			<div class="row heading_result">Final Result</div>
			<div class="row">
				<div class="col-md-3"><img class="std_image" src="<?php echo base_url(); ?>/assets/img/prime_logo.png" alt="No image found">
				</div>
				<div class="col-md-9">
					<table class="">
						<tbody>
							<tr>
								<td>Sorry ! <br/>No Result Found.</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
<?php
		}

		// $this->Get_result->index($sid);
	}
}
