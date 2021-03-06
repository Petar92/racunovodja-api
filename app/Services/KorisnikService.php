<?php

namespace App\Services;

use App\Exceptions\ZaposleniSaJmbgIliSifromVecPostojiException;
use App\Repositories\KorisnikRepository;
use App\Repositories\ZaposleniRepository;
use App\Zaposleni;

class KorisnikService
{
    private $_korisnikRepository;
    private $_zaposleniService;

    public function __construct(
        KorisnikRepository $korisnikRepository,
        ZaposleniService $zaposleniService
    ) {
        $this->_korisnikRepository = $korisnikRepository;
        $this->_zaposleniService = $zaposleniService;
    }

    public function register($validData)
    {
        return $this->_korisnikRepository->register($validData);
    }
    public function vecImaZaposlenogSaJmbg($jmbg)
    {
        return $this->_korisnikRepository->vecImaZaposlenogSaJmbg($jmbg);
    }

    public function vecImaZaposlenogSaSifrom($sifra)
    {
        return $this->_korisnikRepository->vecImaZaposlenogSaSifrom($sifra);
    }

    public function zaposleniLogovanogKorisnikaSaJmbgom($jmbg)
    {
        return $this->_zaposleniService->zaposleniLogovanogKorisnikaSaJmbgom(
            $jmbg
        );
    }

    public function zaposleniLogovanogKorisnikaSaSifrom($sifra)
    {
        return $this->_zaposleniService->zaposleniLogovanogKorisnikaSaSifrom(
            $sifra
        );
    }

    public function detaljiLogovanogKorisnika()
    {
        return $this->_korisnikRepository->detaljiKorisnika(/* auth()->user()->id */ 1);
    }

    public function azurirajDetaljeLogovanogKorisnika($data)
    {
        return $this->_korisnikRepository->azurirajDetaljeKorisnika(
            auth()->user()->id,
            $data
        );
    }

    public function trenutnoLogovani()
    {
        $korisnik = $this->_korisnikRepository->osnovniPodaciKorisnika(
            auth()->user()->id
        );

        unset($korisnik->password);

        return $korisnik;
    }
}
