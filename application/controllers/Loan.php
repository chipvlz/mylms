<?php
class Loan extends CI_Controller 
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('loan_model');
		$this->load->library('form_validation');
    }
    
    
    public function index()
	{
		$this->data['loan_list'] = $this->loan_model->get_all();
		
		//loan/index view of all the loan in a table
        $this->load->view('loan/index', $this->data);
        
        $this->load->view('templates/header');
        $this->load->view('templates/footer' );
      
    }
    public function view($id)
    {
        $this->data['view_loan'] = $this->loan_model->get_loan($id);
        
 
       
        $this->load->view('templates/header' );
        $this->load->view('loan/view', $this->data);
        $this->load->view('templates/footer');
    }
    public function submit_data()
    {
    $data = array('amount'                      => $this->input->post('amount'),
                  'interest'                    => $this->input->post('interest'),
                  'loanType'                    => $this->input->post('loanType'),
                  'issueDate'                   => $this->input->post('issueDate'),
                  'dueDate'                     => $this->input->post('dueDate') ,
                  'memberId'                    =>$this->input->post('memberId')
                );
    
    $this->loan_model->insert_loan($data);
    $this->session->set_flashdata('message', 'Your data inserted Successfully..');
    redirect('loan/index');
    }
    function edit_loan($id) 
    {
		//$product = $this->Products_model->get_product($product_id);
        //validate form input
        $this->form_validation->set_rules('amount', 'Amount', 'required|xss_clean');
        $this->form_validation->set_rules('interest', 'Interest', 'required|xss_clean');
        $this->form_validation->set_rules('loanType', 'Loan Type', 'required|xss_clean');
        $this->form_validation->set_rules('issueDate', 'Issue Date', 'required|xss_clean');
        $this->form_validation->set_rules('dueDate', 'Due Date', 'required|xss_clean');
        $this->form_validation->set_rules('memberId', 'Member Id', 'required|xss_clean');
		
           
			if ($this->form_validation->run() == false)
			{
                //get the current loan info
                $this->data['view_loan'] = $this->loan_model->get_loan($id);
                $this->load->view('loan/edit', $this->data);
            }	
            else 
			{
                //validation pass 
                //post values to array
                $data = array(
                    'amount'                        => $this->input->post('amount'),
                    'interest'                      => $this->input->post('interest'),
                    'loanType'                      => $this->input->post('loanType'),
                    'issueDate'                     => $this->input->post('issueDate'),
                    'dueDate'                       => $this->input->post('dueDate') ,
                    'memberId'                      =>$this->input->post('memberId'));
                if($this->loan_model->update_loan($id, $data))
                {
				   $this->session->set_flashdata('message', "<p>loan updated successfully.</p>");
				
                   redirect('loan/index');
                }
			}				
		
	}	
	
    function delete_loan($id) 
    {
		$this->loan_model->delete_loan($id);
		
		$this->session->set_flashdata('message', '<p>loan were successfully deleted!</p>');
		
		redirect('loan/index');
	}
    
	
    
}
?>