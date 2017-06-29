**Drupal 8 test module**

*Time taken:* 4h 43min

*Resources:*
- Drupal 8 Development Cookbook (ed Packt)
- https://www.drupal.org/docs/8
- https://api.drupal.org/api/drupal
- https://drupal.stackexchange.com
- https://www.google.co.uk (to look for error strings)
- https://www.chapterthree.com/blog/custom-restful-api-drupal-8
- http://www.codeexpertz.com/blog/drupal/drupal-8-custom-form-validate-and-submit-hookformalter-example

*Notes:*

This is my first module in Drupal 8. Although it wasn't too bad experience I must admit that the information available is mixed up and there are no complete resources out there to provide a clear guideline on the structure of component building in Drupal 8.

I have not included testing due the simplicity of the component and the fragmented information about testing that I have encountered. It is considerably more complicated than Drupal 7 and requires more time to figure out the right way to do it.

The module returns JSON by responding to an URL, without considering Accept headers or format of data. Possibly that is the next step on completing the code.

I would also like to investigate dynamic routing to extend it to any content type or entity without having to prepare different routers in the yaml file. The structure of the Controller class is already prepared for this with generic helper methods and an open return method that works regardless of the type of node.
