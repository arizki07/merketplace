<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('auth')) {
            return redirect()->to('login')->with('succes', 'Silahkan Login!');
        }

        $userRole = session()->get('role');

        $uri = service('uri');
        $requestedPage = $uri->getsegment(1);

        $allowedPagesWithoutRoleCheck = ['logout', '/'];

        $allowedPages = [
            'Admin' => ['admin', 'admin/dashboard'],
            'Penyedia Jasa' => ['penyedia', 'penyedia/dashboard'],
            'Pengguna Jasa' => ['pengguna', 'pengguna/dashboard'],
        ];

        if (!isset($userRole) || (!in_array($requestedPage, $allowedPagesWithoutRoleCheck) && !in_array($requestedPage, $allowedPages[$userRole]))) {
            $userRole = strtolower($userRole);
            return redirect()->to($userRole . '/dashboard')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini');
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
