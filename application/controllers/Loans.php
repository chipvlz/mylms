<?php
class Loans extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->model('loan_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
    }


    public function index()
	{
        $db_loan=$this->loan_model->get_all();
        $loans = array();
        foreach ($db_loan as $db_loan) {
            $loan['id'] = $db_loan['id'];
            $loan['amount'] = $db_loan['amount'];
            $loan['interest'] = $db_loan['interest'];
            $loan['loanType'] = $db_loan['loanType'];
            $loan['issueDate'] = $db_loan['issueDate'];;
            $loan['dueDate'] = $db_loan['dueDate'];
            $loan['memberId'] = $db_loan['memberId'];
            $loan['settleDate'] = $db_loan['settleDate'];
            array_push($loans, $loan);
        }
        $data['result'] = json_encode(array(
            'data' => array(
                'loans' => $loans
            )
        ));
        $data['title'] = 'Loans';

        $this->load->view('templates/header', $data);
        $this->load->view('loans/index');
        $this->load->view('templates/footer');

    }
    public function view($id)
    {
        $this->data['view_loan'] = $this->loan_model->get_loan($id);
        $this->data['title'] = 'Loan View';
        $this->load->view('templates/header', $this->data);
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

    function settle_loan($id)
    {
        $this->load->model('Transaction_model');

        $data = array(
            'source'                     => $this->input->post('source'),
            'type'                       => $this->input->post('type'),
            'description'                => $this->input->post('description'),
            'issueDate'                  => $this->input->post('issueDate'),
            'amount'                  => $this->input->post('amount')
            );
        //inserting the transaction
        $this->Transaction_model->insert_transaction($data);

        //load all transaction to calculate weather its settle the loan
        $allTransaction=$this->Transaction_model->get_all();
        $totalPayment=0;
        foreach($allTransaction as $transaction)
        {
            $loanId=$transaction->source;
            if($loanId==$id)
            {
                $totalPayment+=$transaction->amount;
            }
        }
        $loan=$this->loan_model->get_loan($id);
        if($loan->amount<$totalPayment)
        {

        }
        else
        {
            $data = array(
                'amount'                        => $loan->amount,
                'interest'                      => $loan->interest,
                'loanType'                      => $loan->loanType,
                'issueDate'                     => $loan->issueDate,
                'dueDate'                       => $loan->dueDate ,
                'memberId'                      => $loan->memberId,
                'settleDate'                    =>$this->input->post('issueDate')
            );
            if($this->loan_model->update_loan($id, $data))
                {
				   $this->session->set_flashdata('message', "<p>loan is setteled.</p>");
                }
        }
    }


}
?>