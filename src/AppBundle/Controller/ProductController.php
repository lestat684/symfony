<?php
/**
 * Created by PhpStorm.
 * User: alisovych
 * Date: 06.09.18
 * Time: 15:03
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/products", name="products_list")
     * @Template()
     */
    public function indexAction()
    {
        $products = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findActive();

        return ['products' => $products];
    }

    /**
     * @Route("/products/{id}", name="product_page", requirements={"id"="\d+"})
     * @Template()
     * @param Product $product
     * @return array
     */
    public function showAction(Product $product)
    {
        return ['product' => $product];
    }
}