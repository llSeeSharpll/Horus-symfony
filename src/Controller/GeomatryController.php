<?php

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;




use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


class GeomatryController extends AbstractController
{
    /**
     * @Route("[GET]/triangle/{a}/{b}/{c}", name="app_traingle")
     */
    public function triangle($a, $b, $c): JsonResponse
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $triangle = new Triangle();
        $triangle->setA($a)
            ->setType('triangle')
            ->setB($b)
            ->setC($c)
            ->setSurface($a, $b)
            ->setCircumference($a, $b, $c);
        $serializedData = $serializer->serialize($triangle, 'json');
        return JsonResponse::fromJsonString($serializedData);
    }

    /**
     * @Route("[GET]/circle/{radius}", name="app_circle",)
     */
    public function circle($radius): JsonResponse
    {
        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $circle = new Circle();
        $circle->setRadius($radius)
            ->setTpye('Circle')
            ->setSurface($radius)
            ->setCircumference($radius);
        $serializedData = $serializer->serialize($circle, 'json');
        return JsonResponse::fromJsonString($serializedData);
    }

    public function sum_of_cicrumfernce(Triangle $triangle, Circle $circle)
    {
        return $circle->getCircumference() + $triangle->getCircumference();
    }
    public function sum_of_area(Triangle $triangle, Circle $circle)
    {
        return ($triangle->getSurface() + $circle->getSurface());
    }
}