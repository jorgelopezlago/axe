<?php

namespace Drupal\axe\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

/**
 *
 */
class AxeController extends ControllerBase {
  /**
   * Helper method to validate the API key argument provided via the URL.
   *
   * @param $key
   * @return bool
   */
  protected function isValidKey($key) {
    if ($key == \Drupal::config('axe.site')->get('siteapikey')) {
      return TRUE;
    }
    else {
      return FALSE;
    }
  }

  /**
   * Helper method to validate the nid argumrnt provided via the URL.
   *
   * @param $nid
   * @return bool
   */
  protected function isValidNode($nid) {
    $values = \Drupal::entityQuery('node')->condition('nid', $nid)->execute();
    return !empty($values);
  }

  /**
   * Callback method for /page_json URL request.
   *
   * @param $key
   * @param $nid
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   */
  public function getJson($key, $nid) {
    if (!$this->isValidKey($key)) {
      throw new AccessDeniedHttpException();
    }
    elseif (!$this->isValidNode($nid)) {
      throw new AccessDeniedHttpException();
    }
    else {
      $serializer = \Drupal::service('serializer');
      $node = Node::load($nid);
      $data = $serializer->serialize($node, 'json', ['plugin_id' => 'entity']);
      return new JsonResponse($data);
    }
  }
}