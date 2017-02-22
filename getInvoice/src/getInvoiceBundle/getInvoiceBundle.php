<?php

namespace getInvoiceBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class getInvoiceBundle extends Bundle {

    public function getParent() {

        return 'FOSUserBundle';
    }

}
