<?php

require_once 'encrypt_decrypt.php';
//include 'Crypt/RSA.php';
//include 'Crypt/Rijndael.php';


$rsaa = new Crypt_RSA();
$keys = $rsaa->createKey(2048);
//echo $keys['privatekey']; 
$private_key=$keys['privatekey'];
//echo $keys['publickey'];
$private_key=$keys['publickey'];
// These keys were generated with keygen.php
//
//$public_key = <<<END_PUB
//-----BEGIN PUBLIC KEY-----
//MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEApzrxdVWcyq43FEkSF2XN
//UfsyGUyimYZFkqwzqrfPRzRd12tf871U7PHRPNeiOO2zJIpMcMSxwPPRmS5jA6nW
//xELhuSA+99QZFRkoxsEoneYvhwL6dzJ7fzT/QHnADrKA0s538ymBsnfl+LbPRxFt
//qarYav7ImE41P7vtKXqjPYZX1a4jTHZRht0l+3GXSNwvOxQUinYEm6GKus2sO8gz
//6b/VHCGwB9z90pHFee09aFg5eXjJr7bcs1HyWiLT0s/+/DLncGZxURh6/AxDdG+R
//rjqZSTmPR+Rn2fkkdpudHmChMI7RjV/Hp3NsfIb53tBy1r3FDbx2NpLN6iuju3m3
//vQIDAQAB
//-----END PUBLIC KEY-----
//END_PUB;
//
//
//$private_key = <<<END_PRI
//-----BEGIN RSA PRIVATE KEY-----
//MIIEogIBAAKCAQEApzrxdVWcyq43FEkSF2XNUfsyGUyimYZFkqwzqrfPRzRd12tf
//871U7PHRPNeiOO2zJIpMcMSxwPPRmS5jA6nWxELhuSA+99QZFRkoxsEoneYvhwL6
//dzJ7fzT/QHnADrKA0s538ymBsnfl+LbPRxFtqarYav7ImE41P7vtKXqjPYZX1a4j
//THZRht0l+3GXSNwvOxQUinYEm6GKus2sO8gz6b/VHCGwB9z90pHFee09aFg5eXjJ
//r7bcs1HyWiLT0s/+/DLncGZxURh6/AxDdG+RrjqZSTmPR+Rn2fkkdpudHmChMI7R
//jV/Hp3NsfIb53tBy1r3FDbx2NpLN6iuju3m3vQIDAQABAoIBAAU5frSzPYhJhBgC
//pmmLuSvwBKMstUHFo6PO9HhHcNbhKHNj++XyCtayQV68v+k2Z+vi1DuLsZ/9HhXC
//kL5bDoYoLsQpYT495qC1ngQDoeC5AdAehDO4JIqXXcgmZZ0v731mjPHQYKhyPYGV
//OImYXkw4NbW2Cw9TFi/ND75FghcYb9NV4yqsTi6crnyplUIBIyoHm0iNWyFnE/OR
//+KQOaeiNtKQTR7/3r6BntYnRPiUn5aJYShvY6/fOqI2eX9mvju6FlE/6j34BASAP
//N/L6pkoErfYjz0mfnRTeaLPMlqy8xs17pqSVVZ25L6YI5h1unJRi2WzJJQpnRbRa
//EiXu5+ECgYEAs0uEwOxHSigxtWzmxJJPfEJuI6z7gBZZ/cSQ2o4Om8PIFqiri+g8
//AnicsYbRTA/heEHlvDvDCrsFqWehMzocwhD2+KV0cScw0g5nSYVVFdiP9IRblxXg
//OjUIuUfNU6Isl7jKGOjGSQ26gjV9is6aC5cq8P73pNH3/VLvfvf0b80CgYEA7sYW
//UR0ru8yWrBdBIKifLrsJbRApOZhSEknUhGgDfeVgDr99aiwTz4RM+0C3zElkdssu
//uKpGPQepMzhITgGct8BY5eiH6nZ8jhnsviUKskOyhei3iB0mCTM5nXtJwglOadV8
//EBKRF7FwudzxSMM6Vx6jCx3jiN6Ia/z5sJwhF7ECgYAVpUBZqizRHxkhNgyGHsPJ
//1JtHY1LZm9kxcdGrEQticrhtQ9+x/E+CXN1N8WDDNgeaZRo/J1fcq8d7NC+Z56Ih
//K7slOZRdNMYIFgUSMy6afJKkinYkP1farxxmgeyf9Cw+BOkhKLkHiMjDf4GwiFDA
//pXdhsOZk15SA2MphIb444QKBgGxixLybRj/gVcDWaXzeritzQYsdW+lGCHM+ylY0
//NOmQFnN7Xv2z9mYrgxpGPWhhJFZ8UsAGow2PDbIvaTrnpnEOwgvS6ud2U4HZqMqD
//XAChlEcO5UjHGn3wn8Wpskh/GvYVr1RIaU5dAHOOJITIAhKL2KzyK1f00+5ZDiqq
//JKdxAoGAHVbr6A3uzK7c6vHlgDpSzHWSM6fO553tR6vAm870hM5dE3BMgr6JcBng
//tHZ1OCxCPQTJly2Vfj46r/sxctageCabbvY/GaGmPjr8lXzIiJ5ZCyP/8+RQ7Vqb
//wUfPK/FxKQd7wsJCWu7GVx3idKA5aUbD8RQX4Ou7Az8iYDXLUd4=
//-----END RSA PRIVATE KEY-----
//END_PRI;


// These are some instrctions I found for the Enigma machine ... it seemd appropriate 
// Credit: http://www.ilord.com/enigma-manual1937-english.html
$plaintext = <<<END_PLAIN
9.1 Encoding methods for encryption

   An encoding method for encryption consists of an encoding operation
   and a decoding operation. An encoding operation maps a message M to a
   message representative EM of a specified length; the decoding
   operation maps a message representative EM back to a message. The
   encoding and decoding operations are inverses.

   The message representative EM will typically have some structure that
   can be verified by the decoding operation; the decoding operation
   will output "decoding error" if the structure is not present. The
   encoding operation may also introduce some randomness, so that
   different applications of the encoding operation to the same message
   will produce different representatives.

   Two encoding methods for encryption are employed in the encryption
   schemes and are specified here: EME-OAEP and EME-PKCS1-v1_5.

9.1.1 EME-OAEP

   This encoding method is parameterized by the choice of hash function
   and mask generation function. Suggested hash and mask generation
   functions are given in Section 10. This encoding method is based on
   the method found in [2].

9.1.1.1 Encoding operation

   EME-OAEP-ENCODE (M, P, emLen)

   Options:
   Hash      hash function (hLen denotes the length in octet of the
             hash function output)
   MGF       mask generation function





Kaliski & Staddon            Informational                     [Page 22]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   Input:
   M         message to be encoded, an octet string of length at most
             emLen-1-2hLen
   P         encoding parameters, an octet string
   emLen     intended length in octets of the encoded message, at least
             2hLen+1

   Output:
   EM        encoded message, an octet string of length emLen;
             "message too long" or "parameter string too long"

   Steps:

   1. If the length of P is greater than the input limitation for the
   hash function (2^61-1 octets for SHA-1) then output "parameter string
   too long" and stop.

   2. If ||M|| > emLen-2hLen-1 then output "message too long" and stop.

   3. Generate an octet string PS consisting of emLen-||M||-2hLen-1 zero
   octets. The length of PS may be 0.

   4. Let pHash = Hash(P), an octet string of length hLen.

   5. Concatenate pHash, PS, the message M, and other padding to form a
   data block DB as: DB = pHash || PS || 01 || M

   6. Generate a random octet string seed of length hLen.

   7. Let dbMask = MGF(seed, emLen-hLen).

   8. Let maskedDB = DB \xor dbMask.

   9. Let seedMask = MGF(maskedDB, hLen).

   10. Let maskedSeed = seed \xor seedMask.

   11. Let EM = maskedSeed || maskedDB.

   12. Output EM.

9.1.1.2 Decoding operation EME-OAEP-DECODE (EM, P)

   Options:
   Hash      hash function (hLen denotes the length in octet of the hash
             function output)

   MGF       mask generation function



Kaliski & Staddon            Informational                     [Page 23]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   Input:

   EM        encoded message, an octet string of length at least 2hLen+1
   P         encoding parameters, an octet string

   Output:
   M         recovered message, an octet string of length at most
             ||EM||-1-2hLen; or "decoding error"

   Steps:

   1. If the length of P is greater than the input limitation for the
   hash function (2^61-1 octets for SHA-1) then output "parameter string
   too long" and stop.

   2. If ||EM|| < 2hLen+1, then output "decoding error" and stop.

   3. Let maskedSeed be the first hLen octets of EM and let maskedDB be
   the remaining ||EM|| - hLen octets.

   4. Let seedMask = MGF(maskedDB, hLen).

   5. Let seed = maskedSeed \xor seedMask.

   6. Let dbMask = MGF(seed, ||EM|| - hLen).

   7. Let DB = maskedDB \xor dbMask.

   8. Let pHash = Hash(P), an octet string of length hLen.

   9. Separate DB into an octet string pHash' consisting of the first
   hLen octets of DB, a (possibly empty) octet string PS consisting of
   consecutive zero octets following pHash', and a message M as:

   DB = pHash' || PS || 01 || M

   If there is no 01 octet to separate PS from M, output "decoding
   error" and stop.

   10. If pHash' does not equal pHash, output "decoding error" and stop.

   11. Output M.

9.1.2 EME-PKCS1-v1_5

   This encoding method is the same as in PKCS #1 v1.5, Section 8:
   Encryption Process.




Kaliski & Staddon            Informational                     [Page 24]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


9.1.2.1 Encoding operation

   EME-PKCS1-V1_5-ENCODE (M, emLen)

   Input:
   M         message to be encoded, an octet string of length at most
             emLen-10
   emLen     intended length in octets of the encoded message

   Output:
   EM        encoded message, an octet string of length emLen; or
             "message too long"

   Steps:

   1. If the length of the message M is greater than emLen - 10 octets,
   output "message too long" and stop.

   2. Generate an octet string PS of length emLen-||M||-2 consisting of
   pseudorandomly generated nonzero octets. The length of PS will be at
   least 8 octets.

   3. Concatenate PS, the message M, and other padding to form the
   encoded message EM as:

   EM = 02 || PS || 00 || M

   4. Output EM.

9.1.2.2 Decoding operation

   EME-PKCS1-V1_5-DECODE (EM)

   Input:
   EM      encoded message, an octet string of length at least 10

   Output:
   M       recovered message, an octet string of length at most
           ||EM||-10; or "decoding error"

   Steps:

   1. If the length of the encoded message EM is less than 10, output
   "decoding error" and stop.

   2. Separate the encoded message EM into an octet string PS consisting
   of nonzero octets and a message M as: EM = 02 || PS || 00 || M.




Kaliski & Staddon            Informational                     [Page 25]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   If the first octet of EM is not 02, or if there is no 00 octet to
   separate PS from M, output "decoding error" and stop.

   3. If the length of PS is less than 8 octets, output "decoding error"
   and stop.

   4. Output M.

9.2 Encoding methods for signatures with appendix

   An encoding method for signatures with appendix, for the purposes of
   this document, consists of an encoding operation. An encoding
   operation maps a message M to a message representative EM of a
   specified length. (In future versions of this document, encoding
   methods may be added that also include a decoding operation.)

   One encoding method for signatures with appendix is employed in the
   encryption schemes and is specified here: EMSA-PKCS1-v1_5.

9.2.1 EMSA-PKCS1-v1_5

   This encoding method only has an encoding operation.

   EMSA-PKCS1-v1_5-ENCODE (M, emLen)

   Option:
   Hash      hash function (hLen denotes the length in octet of the hash
             function output)

   Input:
   M         message to be encoded
   emLen     intended length in octets of the encoded message, at least
             ||T|| + 10, where T is the DER encoding of a certain value
             computed during the encoding operation

   Output:
   EM        encoded message, an octet string of length emLen; or "message
             too long" or "intended encoded message length too short"

   Steps:

   1. Apply the hash function to the message M to produce a hash value
   H:

   H = Hash(M).

   If the hash function outputs "message too long," then output "message
   too long".



Kaliski & Staddon            Informational                     [Page 26]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   2. Encode the algorithm ID for the hash function and the hash value
   into an ASN.1 value of type DigestInfo (see Section 11) with the
   Distinguished Encoding Rules (DER), where the type DigestInfo has the
   syntax

   DigestInfo::=SEQUENCE{
     digestAlgorithm  AlgorithmIdentifier,
     digest OCTET STRING }

   The first field identifies the hash function and the second contains
   the hash value. Let T be the DER encoding.

   3. If emLen is less than ||T|| + 10 then output "intended encoded
   message length too short".

   4. Generate an octet string PS consisting of emLen-||T||-2 octets
   with value FF (hexadecimal). The length of PS will be at least 8
   octets.

   5. Concatenate PS, the DER encoding T, and other padding to form the
   encoded message EM as: EM = 01 || PS || 00 || T

   6. Output EM.

10. Auxiliary Functions

   This section specifies the hash functions and the mask generation
   functions that are mentioned in the encoding methods (Section 9).

10.1 Hash Functions

   Hash functions are used in the operations contained in Sections 7, 8
   and 9. Hash functions are deterministic, meaning that the output is
   completely determined by the input. Hash functions take octet strings
   of variable length, and generate fixed length octet strings. The hash
   functions used in the operations contained in Sections 7, 8 and 9
   should be collision resistant. This means that it is infeasible to
   find two distinct inputs to the hash function that produce the same
   output. A collision resistant hash function also has the desirable
   property of being one-way; this means that given an output, it is
   infeasible to find an input whose hash is the specified output. The
   property of collision resistance is especially desirable for RSASSA-
   PKCS1-v1_5, as it makes it infeasible to forge signatures. In
   addition to the requirements, the hash function should yield a mask
   generation function  (Section 10.2) with pseudorandom output.






Kaliski & Staddon            Informational                     [Page 27]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   Three hash functions are recommended for the encoding methods in this
   document: MD2 [15], MD5 [17], and SHA-1 [16]. For the EME-OAEP
   encoding method, only SHA-1 is recommended. For the EMSA-PKCS1-v1_5
   encoding method, SHA-1 is recommended for new applications. MD2 and
   MD5 are recommended only for compatibility with existing applications
   based on PKCS #1 v1.5.

   The hash functions themselves are not defined here; readers are
   referred to the appropriate references ([15], [17] and [16]).

   Note. Version 1.5 of this document also allowed for the use of MD4 in
   signature schemes. The cryptanalysis of MD4 has progressed
   significantly in the intervening years. For example, Dobbertin [10]
   demonstrated how to find collisions for MD4 and that the first two
   rounds of MD4 are not one-way [11]. Because of these results and
   others (e.g. [9]), MD4 is no longer recommended. There have also been
   advances in the cryptanalysis of MD2 and MD5, although not enough to
   warrant removal from existing applications. Rogier and Chauvaud [19]
   demonstrated how to find collisions in a modified version of MD2. No
   one has demonstrated how to find collisions for the full MD5
   algorithm, although partial results have been found (e.g. [8]). For
   new applications, to address these concerns, SHA-1 is preferred.

10.2 Mask Generation Functions

   A mask generation function takes an octet string of variable length
   and a desired output length as input, and outputs an octet string of
   the desired length. There may be restrictions on the length of the
   input and output octet strings, but such bounds are generally very
   large. Mask generation functions are deterministic; the octet string
   output is completely determined by the input octet string. The output
   of a mask generation function should be pseudorandom, that is, if the
   seed to the function is unknown, it should be infeasible to
   distinguish the output from a truly random string. The plaintext-
   awareness of RSAES-OAEP relies on the random nature of the output of
   the mask generation function, which in turn relies on the random
   nature of the underlying hash.

   One mask generation function is recommended for the encoding methods
   in this document, and is defined here: MGF1, which is based on a hash
   function. Future versions of this document may define other mask
   generation functions.

10.2.1 MGF1

   MGF1 is a Mask Generation Function based on a hash function.

   MGF1 (Z, l)



Kaliski & Staddon            Informational                     [Page 28]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   Options:
   Hash    hash function (hLen denotes the length in octets of the hash
           function output)

   Input:
   Z       seed from which mask is generated, an octet string
   l       intended length in octets of the mask, at most 2^32(hLen)

   Output:
   mask    mask, an octet string of length l; or "mask too long"

   Steps:

   1.If l > 2^32(hLen), output "mask too long" and stop.

   2.Let T  be the empty octet string.

   3.For counter from 0 to \lceil{l / hLen}\rceil-1, do the following:

   a.Convert counter to an octet string C of length 4 with the primitive
   I2OSP: C = I2OSP (counter, 4)

   b.Concatenate the hash of the seed Z and C to the octet string T: T =
   T || Hash (Z || C)

   4.Output the leading l octets of T as the octet string mask.

11. ASN.1 syntax

11.1 Key representation

   This section defines ASN.1 object identifiers for RSA public and
   private keys, and defines the types RSAPublicKey and RSAPrivateKey.
   The intended application of these definitions includes X.509
   certificates, PKCS #8 [22], and PKCS #12 [23].

   The object identifier rsaEncryption identifies RSA public and private
   keys as defined in Sections 11.1.1 and 11.1.2. The parameters field
   associated with this OID in an AlgorithmIdentifier shall have type
   NULL.

   rsaEncryption OBJECT IDENTIFIER ::= {pkcs-1 1}

   All of the definitions in this section are the same as in PKCS #1
   v1.5.






Kaliski & Staddon            Informational                     [Page 29]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


11.1.1 Public-key syntax

   An RSA public key should be represented with the ASN.1 type
   RSAPublicKey:

   RSAPublicKey::=SEQUENCE{
     modulus INTEGER, -- n
     publicExponent INTEGER -- e }

   (This type is specified in X.509 and is retained here for
   compatibility.)

   The fields of type RSAPublicKey have the following meanings:
   -modulus is the modulus n.
   -publicExponent is the public exponent e.

11.1.2 Private-key syntax

   An RSA private key should be represented with ASN.1 type
   RSAPrivateKey:

   RSAPrivateKey ::= SEQUENCE {
     version Version,
     modulus INTEGER, -- n
     publicExponent INTEGER, -- e
     privateExponent INTEGER, -- d
     prime1 INTEGER, -- p
     prime2 INTEGER, -- q
     exponent1 INTEGER, -- d mod (p-1)
     exponent2 INTEGER, -- d mod (q-1)
     coefficient INTEGER -- (inverse of q) mod p }

   Version ::= INTEGER

   The fields of type RSAPrivateKey have the following meanings:

   -version is the version number, for compatibility with future
   revisions of this document. It shall be 0 for this version of the
   document.
   -modulus is the modulus n.
   -publicExponent is the public exponent e.
   -privateExponent is the private exponent d.
   -prime1 is the prime factor p of n.
   -prime2 is the prime factor q of n.
   -exponent1 is d mod (p-1).
   -exponent2 is d mod (q-1).
   -coefficient is the Chinese Remainder Theorem coefficient q-1 mod p.




Kaliski & Staddon            Informational                     [Page 30]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


11.2 Scheme identification

   This section defines object identifiers for the encryption and
   signature schemes. The schemes compatible with PKCS #1 v1.5 have the
   same definitions as in PKCS #1 v1.5. The intended application of
   these definitions includes X.509 certificates and PKCS #7.

11.2.1 Syntax for RSAES-OAEP

   The object identifier id-RSAES-OAEP identifies the RSAES-OAEP
   encryption scheme.

   id-RSAES-OAEP OBJECT IDENTIFIER ::= {pkcs-1 7}

   The parameters field associated with this OID in an
   AlgorithmIdentifier shall have type RSAEP-OAEP-params:

   RSAES-OAEP-params ::=  SEQUENCE {
     hashFunc [0] AlgorithmIdentifier {{oaepDigestAlgorithms}}
       DEFAULT sha1Identifier,
     maskGenFunc [1] AlgorithmIdentifier {{pkcs1MGFAlgorithms}}
       DEFAULT mgf1SHA1Identifier,
     pSourceFunc [2] AlgorithmIdentifier
       {{pkcs1pSourceAlgorithms}}
       DEFAULT pSpecifiedEmptyIdentifier }

   The fields of type RSAES-OAEP-params have the following meanings:

   -hashFunc identifies the hash function. It shall be an algorithm ID
   with an OID in the set oaepDigestAlgorithms, which for this version
   shall consist of id-sha1, identifying the SHA-1 hash function. The
   parameters field for id-sha1 shall have type NULL.

   oaepDigestAlgorithms ALGORITHM-IDENTIFIER ::= {
     {NULL IDENTIFIED BY id-sha1} }

   id-sha1 OBJECT IDENTIFIER ::=
     {iso(1) identified-organization(3) oiw(14) secsig(3)
       algorithms(2) 26}


   The default hash function is SHA-1:
   sha1Identifier ::= AlgorithmIdentifier {id-sha1, NULL}

   -maskGenFunc identifies the mask generation function. It shall be an
   algorithm ID with an OID in the set pkcs1MGFAlgorithms, which for
   this version shall consist of id-mgf1, identifying the MGF1 mask
   generation function (see Section 10.2.1). The parameters field for



Kaliski & Staddon            Informational                     [Page 31]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   id-mgf1 shall have type AlgorithmIdentifier, identifying the hash
   function on which MGF1 is based, where the OID for the hash function
   shall be in the set oaepDigestAlgorithms.

   pkcs1MGFAlgorithms ALGORITHM-IDENTIFIER ::= {
     {AlgorithmIdentifier {{oaepDigestAlgorithms}} IDENTIFIED
       BY id-mgf1} }

   id-mgf1 OBJECT IDENTIFIER ::= {pkcs-1 8}

   The default mask generation function is MGF1 with SHA-1:

   mgf1SHA1Identifier ::= AlgorithmIdentifier {
     id-mgf1, sha1Identifier }

   -pSourceFunc identifies the source (and possibly the value) of the
   encoding parameters P. It shall be an algorithm ID with an OID in the
   set pkcs1pSourceAlgorithms, which for this version shall consist of
   id-pSpecified, indicating that the encoding parameters are specified
   explicitly. The parameters field for id-pSpecified shall have type
   OCTET STRING, containing the encoding parameters.

   pkcs1pSourceAlgorithms ALGORITHM-IDENTIFIER ::= {
     {OCTET STRING IDENTIFIED BY id-pSpecified} }

   id-pSpecified OBJECT IDENTIFIER ::= {pkcs-1 9}

   The default encoding parameters is an empty string (so that pHash in
   EME-OAEP will contain the hash of the empty string):

   pSpecifiedEmptyIdentifier ::= AlgorithmIdentifier {
     id-pSpecified, OCTET STRING SIZE (0) }

   If all of the default values of the fields in RSAES-OAEP-params are
   used, then the algorithm identifier will have the following value:

   RSAES-OAEP-Default-Identifier ::= AlgorithmIdentifier {
     id-RSAES-OAEP,
     {sha1Identifier,
      mgf1SHA1Identifier,
      pSpecifiedEmptyIdentifier } }

11.2.2 Syntax for RSAES-PKCS1-v1_5

   The object identifier rsaEncryption (Section 11.1) identifies the
   RSAES-PKCS1-v1_5 encryption scheme. The parameters field associated
   with this OID in an AlgorithmIdentifier shall have type NULL. This is
   the same as in PKCS #1 v1.5.



Kaliski & Staddon            Informational                     [Page 32]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   RsaEncryption   OBJECT IDENTIFIER ::= {PKCS-1 1}

11.2.3 Syntax for RSASSA-PKCS1-v1_5

   The object identifier for RSASSA-PKCS1-v1_5 shall be one of the
   following. The choice of OID depends on the choice of hash algorithm:
   MD2, MD5 or SHA-1. Note that if either MD2 or MD5 is used then the
   OID is just as in PKCS #1 v1.5. For each OID, the parameters field
   associated with this OID in an AlgorithmIdentifier shall have type
   NULL.

   If the hash function to be used is MD2, then the OID should be:

   md2WithRSAEncryption ::= {PKCS-1 2}

   If the hash function to be used is MD5, then the OID should be:

   md5WithRSAEncryption ::= {PKCS-1 4}

   If the hash function to be used is SHA-1, then the OID should be:

   sha1WithRSAEncryption ::= {pkcs-1 5}

   In the digestInfo type mentioned in Section 9.2.1 the OIDS for the
   digest algorithm are the following:

   id-SHA1 OBJECT IDENTIFIER ::=
           {iso(1) identified-organization(3) oiw(14) secsig(3)
            algorithms(2) 26 }

   md2 OBJECT IDENTIFIER ::=
           {iso(1) member-body(2) US(840) rsadsi(113549)
            digestAlgorithm(2) 2}

   md5 OBJECT IDENTIFIER ::=
           {iso(1) member-body(2) US(840) rsadsi(113549)
            digestAlgorithm(2) 5}

   The parameters field of the digest algorithm has ASN.1 type NULL for
   these OIDs.

12. Patent statement

   The Internet Standards Process as defined in RFC 1310 requires a
   written statement from the Patent holder that a license will be made
   available to applicants under reasonable terms and conditions prior
   to approving a specification as a Proposed, Draft or Internet
   Standard.



Kaliski & Staddon            Informational                     [Page 33]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   The Internet Society, Internet Architecture Board, Internet
   Engineering Steering Group and the Corporation for National Research
   Initiatives take no position on the validity or scope of the
   following patents and patent applications, nor on the appropriateness
   of the terms of the assurance. The Internet Society and other groups
   mentioned above have not made any determination as to any other
   intellectual property rights which may apply to the practice of this
   standard.  Any further consideration of these matters is the user's
   responsibility.

12.1 Patent statement for the RSA algorithm

   The Massachusetts Institute of Technology has granted RSA Data
   Security, Inc., exclusive sub-licensing rights to the following
   patent issued in the United States:

   Cryptographic Communications System and Method ("RSA"), No. 4,405,829

   RSA Data Security, Inc. has provided the following statement with
   regard to this patent:

   It is RSA's business practice to make licenses to its patents
   available on reasonable and nondiscriminatory terms. Accordingly, RSA
   is willing, upon request, to grant non-exclusive licenses to such
   patent on reasonable and non-discriminatory terms and conditions to
   those who respect RSA's intellectual property rights and subject to
   RSA's then current royalty rate for the patent licensed. The royalty
   rate for the RSA patent is presently set at 2% of the licensee's
   selling price for each product covered by the patent.  Any requests
   for license information may be directed to:

            Director of Licensing
            RSA Data Security, Inc.
            2955 Campus Drive
            Suite 400
            San Mateo, CA 94403

   A license under RSA's patent(s) does not include any rights to know-
   how or other technical information or license under other
   intellectual property rights.  Such license does not extend to any
   activities which constitute infringement or inducement thereto. A
   licensee must make his own determination as to whether a license is
   necessary under patents of others.








Kaliski & Staddon            Informational                     [Page 34]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


13. Revision history

   Versions 1.0-1.3

   Versions 1.0-1.3 were distributed to participants in RSA Data
   Security, Inc.'s Public-Key Cryptography Standards meetings in
   February and March 1991.


   Version 1.4

   Version 1.4 was part of the June 3, 1991 initial public release of
   PKCS. Version 1.4 was published as NIST/OSI Implementors' Workshop
   document SEC-SIG-91-18.


   Version 1.5

   Version 1.5 incorporates several editorial changes, including updates
   to the references and the addition of a revision history. The
   following substantive changes were made: -Section 10: "MD4 with RSA"
   signature and verification processes were added.

   -Section 11: md4WithRSAEncryption object identifier was added.

   Version 2.0 [DRAFT]

   Version 2.0 incorporates major editorial changes in terms of the
   document structure, and introduces the RSAEP-OAEP encryption scheme.
   This version continues to support the encryption and signature
   processes in version 1.5, although the hash algorithm MD4 is no
   longer allowed due to cryptanalytic advances in the intervening
   years.

14. References

   [1] ANSI, ANSI X9.44: Key Management Using Reversible Public Key
       Cryptography for the Financial Services Industry. Work in
       Progress.

   [2] M. Bellare and P. Rogaway. Optimal Asymmetric Encryption - How to
       Encrypt with RSA. In Advances in Cryptology-Eurocrypt '94, pp.
       92-111, Springer-Verlag, 1994.

   [3] M. Bellare and P. Rogaway. The Exact Security of Digital
       Signatures - How to Sign with RSA and Rabin. In Advances in
       Cryptology-Eurocrypt '96, pp. 399-416, Springer-Verlag, 1996.




Kaliski & Staddon            Informational                     [Page 35]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   [4] D. Bleichenbacher. Chosen Ciphertext Attacks against Protocols
       Based on the RSA Encryption Standard PKCS #1. To appear in
       Advances in Cryptology-Crypto '98.

   [5] D. Bleichenbacher, B. Kaliski and J. Staddon. Recent Results on
       PKCS #1: RSA Encryption Standard. RSA Laboratories' Bulletin,
       Number 7, June 24, 1998.

   [6] CCITT. Recommendation X.509: The Directory-Authentication
       Framework. 1988.

   [7] D. Coppersmith, M. Franklin, J. Patarin and M. Reiter. Low-
       Exponent RSA with Related Messages. In Advances in Cryptology-
       Eurocrypt '96, pp. 1-9, Springer-Verlag, 1996

   [8] B. Den Boer and Bosselaers. Collisions for the Compression
       Function of MD5. In Advances in Cryptology-Eurocrypt '93, pp
       293-304, Springer-Verlag, 1994.

   [9] B. den Boer, and A. Bosselaers. An Attack on the Last Two Rounds
       of MD4. In Advances in Cryptology-Crypto '91, pp.194-203,
       Springer-Verlag, 1992.

   [10] H. Dobbertin. Cryptanalysis of MD4. Fast Software Encryption.
        Lecture Notes in Computer Science, Springer-Verlag 1996, pp.
        55-72.

   [11] H. Dobbertin. Cryptanalysis of MD5 Compress. Presented at the
        rump session of Eurocrypt `96, May 14, 1996

   [12] H. Dobbertin.The First Two Rounds of MD4 are Not One-Way. Fast
        Software Encryption. Lecture Notes in Computer Science,
        Springer-Verlag 1998, pp. 284-292.

   [13] J. Hastad. Solving Simultaneous Modular Equations of Low Degree.
        SIAM Journal of Computing, 17, 1988, pp. 336-341.

   [14] IEEE. IEEE P1363: Standard Specifications for Public Key
        Cryptography. Draft Version 4.

   [15] Kaliski, B., "The MD2 Message-Digest Algorithm", RFC 1319, April
        1992.

   [16] National Institute of Standards and Technology (NIST). FIPS
        Publication 180-1: Secure Hash Standard. April 1994.

   [17] Rivest, R., "The MD5 Message-Digest Algorithm", RFC 1321, April
        1992.



Kaliski & Staddon            Informational                     [Page 36]

RFC 2437        PKCS #1: RSA Cryptography Specifications    October 1998


   [18] R. Rivest, A. Shamir and L. Adleman. A Method for Obtaining
        Digital Signatures and Public-Key Cryptosystems. Communications
        of the ACM, 21(2), pp. 120-126, February 1978.

   [19] N. Rogier and P. Chauvaud. The Compression Function of MD2 is
        not Collision Free. Presented at Selected Areas of Cryptography
        `95. Carleton University, Ottawa, Canada. May 18-19, 1995.

   [20] RSA Laboratories. PKCS #1: RSA Encryption Standard. Version 1.5,
        November 1993.

   [21] RSA Laboratories. PKCS #7: Cryptographic Message Syntax
        Standard. Version 1.5, November 1993.

   [22] RSA  Laboratories. PKCS #8: Private-Key Information Syntax
        Standard. Version 1.2, November 1993.

   [23] RSA Laboratories. PKCS #12: Personal Information Exchange Syntax
        Standard. Version 1.0, Work in Progress, April 1997.

Security Considerations

   Security issues are discussed throughout this memo.

Acknowledgements

   This document is based on a contribution of RSA Laboratories, a
   division of RSA Data Security, Inc.  Any substantial use of the text
   from this document must acknowledge RSA Data Security, Inc. RSA Data
   Security, Inc. requests that all material mentioning or referencing
   this document identify this as "RSA Data Security, Inc. PKCS #1
   v2.0".
 

END_PLAIN;

echo '<pre>';
echo "Starting Plaintext:\n$plaintext";
echo "\n --- \n";
$ciphertext = encrypt_message($plaintext,$public_key);
echo "\nCiphertext:\n";
echo chunk_split($ciphertext);
$plaintext2 = decrypt_message($ciphertext,$private_key);
echo "\n\nDecrypted Back into Plaintext\n\n";

echo $plaintext;




?>