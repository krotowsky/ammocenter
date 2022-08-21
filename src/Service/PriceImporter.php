<?php

namespace App\Service;

use App\Entity\ProductUrl;
use DateTimeImmutable;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\CssSelector\CssSelectorConverter;
use Symfony\Component\DomCrawler\Crawler;

class PriceImporter
{

    private  $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getPrice() : float{
        $price = $this->crawl();
        return $price = 1.2;
    }


    public function crawl(){

        $urls = $this->getUrlToUpdate();
        foreach ($urls as $key) {
            $html = file_get_contents($key->getUrl());
            $converter = new CssSelectorConverter();
            $xpath = $converter->toXPath($key->getCssSelector());
            $crawler = new Crawler($html);
            $crawler = $crawler->filterXPath($xpath);

            foreach ($crawler as $domElement) {
                var_dump($domElement->textContent);
                $price = trim($domElement->textContent, " \t\n\r\0\x0B");
                $date = new \DateTimeImmutable('now');
                $product = $this->em->getRepository(ProductUrl::class)->findOneBy(['id' => $key->getId()]);
                $product->setPrice(str_replace(array('/ szt.','zł',' ',' ','Cena',':','brutto','(1szt.=',"\n",")"),'',$price));
                $product->setUpdatedAt($date);
                $this->em->flush();

            }
        }
    return null;
    }

    public function getUrlToUpdate(): array
    {
        $urls = $this->em->getRepository(ProductUrl::class)->findBy(['price'=>null]);

        return $urls;
    }

}