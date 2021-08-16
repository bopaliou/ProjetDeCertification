<?php

namespace App\Controller\Admin;

use App\Entity\Document;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DocumentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Document::class;
    }

 
    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('user_document');
        yield TextField::new('type');
        yield IntegerField::new('Numero');
        yield DateField::new('dateEnregistrement');
        yield DateField::new('dateExpiration');
        yield TextField::new('adresse');
        yield BooleanField::new('etat');
    }
  
}
