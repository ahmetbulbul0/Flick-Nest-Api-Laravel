<?php

namespace App\Services;

use App\Models\Country;
use Illuminate\Support\Collection;
use App\Interfaces\Services\CountryServiceInterface;
use App\Interfaces\Repositories\CountryRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

class CountryService implements CountryServiceInterface
{
    protected $countryRepository;

    public function __construct(CountryRepositoryInterface $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries()
    {
        try {
            $countries = $this->countryRepository->getAll();
            return $this->formatResponse(true, 'Ülkeler başarıyla getirildi.', $countries);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülkeler getirilirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function getActiveCountries()
    {
        try {
            $countries = $this->countryRepository->getAllActive();
            return $this->formatResponse(true, 'Aktif ülkeler başarıyla getirildi.', $countries);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Aktif ülkeler getirilirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function getCountryById(int $id)
    {
        try {
            $country = $this->countryRepository->findById($id);
            return $this->formatResponse(true, 'Ülke başarıyla getirildi.', $country);
        } catch (ModelNotFoundException $e) {
            return $this->formatResponse(false, 'Ülke bulunamadı.', null, 'Belirtilen ID ile ülke bulunamadı.');
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke getirilirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function getCountryByIso2(string $code)
    {
        try {
            $country = $this->countryRepository->findByIso2($code);
            if (!$country) {
                return $this->formatResponse(false, 'Ülke bulunamadı.', null, 'Belirtilen ISO-2 kodu ile ülke bulunamadı.');
            }
            return $this->formatResponse(true, 'Ülke başarıyla getirildi.', $country);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke getirilirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function getCountryByIso3(string $code)
    {
        try {
            $country = $this->countryRepository->findByIso3($code);
            if (!$country) {
                return $this->formatResponse(false, 'Ülke bulunamadı.', null, 'Belirtilen ISO-3 kodu ile ülke bulunamadı.');
            }
            return $this->formatResponse(true, 'Ülke başarıyla getirildi.', $country);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke getirilirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function createCountry(array $data)
    {
        try {
            $validator = $this->validateCountryData($data);
            if ($validator->fails()) {
                return $this->formatResponse(false, 'Validasyon hatası.', null, $validator->errors());
            }

            $country = $this->countryRepository->create($data);
            return $this->formatResponse(true, 'Ülke başarıyla oluşturuldu.', $country);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke oluşturulurken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function updateCountry(int $id, array $data)
    {
        try {
            $validator = $this->validateCountryData($data, $id);
            if ($validator->fails()) {
                return $this->formatResponse(false, 'Validasyon hatası.', null, $validator->errors());
            }

            $country = $this->countryRepository->update($id, $data);
            return $this->formatResponse(true, 'Ülke başarıyla güncellendi.', $country);
        } catch (ModelNotFoundException $e) {
            return $this->formatResponse(false, 'Ülke bulunamadı.', null, 'Belirtilen ID ile ülke bulunamadı.');
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke güncellenirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function deleteCountry(int $id)
    {
        try {
            $this->countryRepository->delete($id);
            return $this->formatResponse(true, 'Ülke başarıyla silindi.');
        } catch (ModelNotFoundException $e) {
            return $this->formatResponse(false, 'Ülke bulunamadı.', null, 'Belirtilen ID ile ülke bulunamadı.');
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke silinirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function restoreCountry(int $id)
    {
        try {
            $country = $this->countryRepository->restore($id);
            return $this->formatResponse(true, 'Ülke başarıyla geri yüklendi.', $country);
        } catch (ModelNotFoundException $e) {
            return $this->formatResponse(false, 'Ülke bulunamadı.', null, 'Belirtilen ID ile ülke bulunamadı.');
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke geri yüklenirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function forceDeleteCountry(int $id)
    {
        try {
            $this->countryRepository->forceDelete($id);
            return $this->formatResponse(true, 'Ülke kalıcı olarak silindi.');
        } catch (ModelNotFoundException $e) {
            return $this->formatResponse(false, 'Ülke bulunamadı.', null, 'Belirtilen ID ile ülke bulunamadı.');
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke kalıcı olarak silinirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function getCountriesByRegion(string $region)
    {
        try {
            $countries = $this->countryRepository->getByRegion($region);
            return $this->formatResponse(true, 'Bölgeye göre ülkeler başarıyla getirildi.', $countries);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Bölgeye göre ülkeler getirilirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function getCountriesBySubregion(string $subregion)
    {
        try {
            $countries = $this->countryRepository->getBySubregion($subregion);
            return $this->formatResponse(true, 'Alt bölgeye göre ülkeler başarıyla getirildi.', $countries);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Alt bölgeye göre ülkeler getirilirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function searchCountries(string $term)
    {
        try {
            $countries = $this->countryRepository->search($term);
            return $this->formatResponse(true, 'Arama sonuçları başarıyla getirildi.', $countries);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke araması yapılırken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function updateCountriesOrder(array $order)
    {
        try {
            $this->countryRepository->updateOrder($order);
            return $this->formatResponse(true, 'Ülke sıralaması başarıyla güncellendi.');
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke sıralaması güncellenirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function toggleCountryStatus(int $id)
    {
        try {
            $country = $this->countryRepository->toggleActive($id);
            $status = $country->is_active ? 'aktif' : 'pasif';
            return $this->formatResponse(true, "Ülke durumu {$status} olarak güncellendi.", $country);
        } catch (ModelNotFoundException $e) {
            return $this->formatResponse(false, 'Ülke bulunamadı.', null, 'Belirtilen ID ile ülke bulunamadı.');
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Ülke durumu güncellenirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function getAllRegions()
    {
        try {
            $regions = $this->countryRepository->getRegions();
            return $this->formatResponse(true, 'Bölgeler başarıyla getirildi.', $regions);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Bölgeler getirilirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    public function getSubregionsByRegion(string $region)
    {
        try {
            $subregions = $this->countryRepository->getSubregions($region);
            return $this->formatResponse(true, 'Alt bölgeler başarıyla getirildi.', $subregions);
        } catch (\Exception $e) {
            return $this->formatResponse(false, 'Alt bölgeler getirilirken bir hata oluştu.', null, $e->getMessage());
        }
    }

    protected function validateCountryData(array $data, ?int $id = null)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'native_name' => 'nullable|string|max:255',
            'iso_code_2' => 'required|string|size:2|unique:countries,iso_code_2' . ($id ? ",{$id}" : ''),
            'iso_code_3' => 'required|string|size:3|unique:countries,iso_code_3' . ($id ? ",{$id}" : ''),
            'numeric_code' => 'required|string|size:3|unique:countries,numeric_code' . ($id ? ",{$id}" : ''),
            'phone_code' => 'required|string|max:10',
            'capital' => 'nullable|string|max:255',
            'currency_code' => 'nullable|string|max:3',
            'currency_name' => 'nullable|string|max:255',
            'currency_symbol' => 'nullable|string|max:10',
            'tld' => 'nullable|string|max:10',
            'region' => 'nullable|string|max:100',
            'subregion' => 'nullable|string|max:100',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'emoji' => 'nullable|string|max:10',
            'is_active' => 'boolean',
            'display_order' => 'nullable|integer'
        ];

        return Validator::make($data, $rules);
    }

    protected function formatResponse(bool $success, string $message, $data = null, $errors = null)
    {
        return [
            'success' => $success,
            'message' => $message,
            'data' => $data,
            'errors' => $errors
        ];
    }
}
