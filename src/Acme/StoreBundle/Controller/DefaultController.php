<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $categories = $em->createQueryBuilder()->select('b')->from('AcmeStoreBundle:Category', 'b')
            ->addOrderBy('b.title', 'DESC')->getQuery()->getResult();
        return $this->render('AcmeStoreBundle:Default:index.html.twig', array('categories' => $categories));
    }

    public function show_categoryAction($id)
    {
        $category =$this->getDoctrine()->getRepository('AcmeStoreBundle:Category')->find($id);
        $products =$category->getProducts();
        //$em = $this->getDoctrine()->getManager();
        //$products = $em->createQueryBuilder()->select('b')->from('AcmeStoreBundle:Product', 'b');
        return $this->render('AcmeStoreBundle:Default:show_category.html.twig', array('products' => $products));
        /*$category = $this->getDoctrine()->getRepository('AcmeStoreBundle:Category')->find($id);
        return $this->render('AcmeStoreBundle:Default:show_category.html.twig', array('category' => $category));*/
    }

    public function show_productAction($id)
    {
        $product = $this->getDoctrine()->getRepository('AcmeStoreBundle:Product')->find($id);
        return $this->render('AcmeStoreBundle:Default:show_product.html.twig', array('product' => $product));
    }
}
