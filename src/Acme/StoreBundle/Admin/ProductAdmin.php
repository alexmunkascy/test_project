<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 29.04.15
 * Time: 22:46
 */

namespace Acme\StoreBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
//use Sonata\AdminBundle\Show\ShowMapper;

class ProductAdmin extends Admin
{
    /**
     * Конфигурация формы редактирования записи
     *
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $categories = array();
        $formMapper
            ->add('title', null, array('label' => 'Product title', 'attr' => array('style' => 'width:583px')))
            ->add('category', 'sonata_type_model_list', array(
                'btn_add'       => 'Add category',      //Specify a custom label
                'btn_list'      => 'Choose category',     //which will be translated
                'btn_delete'    => false,             //or hide the button.
                'btn_catalogue' => 'SonataNewsBundle' //Custom translation domain for buttons
            ), array(
                'placeholder' => 'No category selected'
            ))
            ->add('price', null, array('label' => 'Price'))
            ->add('description', null, array('label' => 'About', 'attr' => array('class' => 'foreditor', 'style' => 'width:569px;height:200px;')));
    }

    /**
     * Конфигурация списка записей
     *
     * @param \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('categories', null, array('label' => 'Category'))
            ->addIdentifier('price', null)
            ->addIdentifier('title', null, array('label' => 'Title'));
            //->add('slug', null, array('label' => 'URL'));
    }

    /**
     * Поля, по которым производится поиск в списке записей
     *
     * @param \Sonata\AdminBundle\Datagrid\DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => 'Product title'))
            //->add('category', null, array('label' => 'Category'))
            ->add('price', null, array('label' => 'Price'))
            ->add('description', null, array('label' => 'Product description'));
    }

}
