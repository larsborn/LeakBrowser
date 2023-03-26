<?php declare(strict_types=1);

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class GlobalSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->setMethod('POST')
            ->add('term', TextType::class, ['attr' => ['placeholder' => 'Search']])
            ->add('button', SubmitType::class, ['label' => '➔']);
    }
}
