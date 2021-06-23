<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Noauth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if(session()->get('isLoggedIn')){
            $status = session()->get();
            if($status['STATUS']=='1'){			
                return redirect()->to('dashboard1');
            }elseif($status['STATUS']=='2'){	
                return redirect()->to('dashboard');
            }elseif($status['STATUS']=='10'){
                return redirect()->to('dashboard3');
            }elseif($status['STATUS']=='3'){
                return redirect()->to('dashboard4');
            }else{
                
            }
        }

    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
