<?php

namespace app\Helpers;

class ResponseHelper
{
    /**
     * Başarılı bir yanıt döndürür.
     *
     * @param mixed $data Yanıt verisi
     * @param string $message Başarı mesajı
     * @param int $status HTTP durum kodu (varsayılan: 200)
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data = null, $message = 'Success', $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    /**
     * Hatalı bir yanıt döndürür.
     *
     * @param string $message Hata mesajı
     * @param int $status HTTP durum kodu (varsayılan: 400)
     * @param mixed $errors Ek hata detayları
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($message = 'Error', $status = 400, $errors = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'errors' => $errors,
        ], $status);
    }
}
